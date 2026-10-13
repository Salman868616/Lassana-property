<?php

namespace App\Services;

use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PropertyReviewWorkflow
{
    public function submit(int $id, User $actor): void
    {
        DB::transaction(function () use ($id, $actor) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['draft']);
            $this->complete($property);
            $previousStatus = $property->status;
            $property->status = 'submitted';
            $property->verification_level = 'unverified';
            $property->published_at = null;
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $actor);
        });
    }

    public function start(int $id, User $actor): void
    {
        DB::transaction(function () use ($id, $actor) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['submitted']);
            $this->complete($property);
            $previousStatus = $property->status;
            $property->status = 'under_review';
            $property->verification_level = 'unverified';
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $actor);
            $property->verifications()->create(['level'=>'basic', 'status'=>'pending']);
        });
    }

    public function verify(int $id, User $reviewer, string $remarks): void
    {
        DB::transaction(function () use ($id, $reviewer, $remarks) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['under_review']);
            if ($property->verifications()->latest('id')->first()?->status === 'approved') {
                throw ValidationException::withMessages(['status'=>'Verification has already been approved.']);
            }
            $this->complete($property);
            $property->verifications()->create([
                'reviewer_id'=>$reviewer->id, 'level'=>'basic', 'status'=>'approved',
                'remarks'=>"Basic checks confirmed: seller identity, property information, and photos.\n".$remarks,
                'reviewed_at'=>now(),
            ]);
            $property->verification_level = 'basic';
            $property->save();
        });
    }


    public function silver(int $id, User $reviewer, array $data): void
    {
        abort_unless($reviewer->hasRole('admin') || $reviewer->hasRole('verification'), 403);
        DB::transaction(function () use ($id, $reviewer, $data) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['under_review','approved','published']);
            if ($property->verification_level !== 'basic') {
                throw ValidationException::withMessages(['verification'=>'Complete Basic verification before granting Silver. Silver cannot be granted twice.']);
            }
            $this->verified($property);
            $this->complete($property);
            foreach (['survey_document_id'=>'survey', 'ownership_document_id'=>'ownership'] as $field=>$type) {
                $document = $property->documents()->with('review')->lockForUpdate()->find($data[$field]);
                if (!$document || $document->document_type !== $type || $document->status !== 'approved'
                    || !$document->verified_at || $document->review?->decision !== 'approved'
                    || !preg_match('#^properties/'.$property->id.'/[A-Za-z0-9]+\\.(pdf|jpg|jpeg|png)$#', $document->path)
                    || !\Illuminate\Support\Facades\Storage::disk('property_documents')->exists($document->path)) {
                    throw ValidationException::withMessages([$field=>'Select an approved '.$type.' document belonging to this property with an available file.']);
                }
            }
            $property->verifications()->create([
                'reviewer_id'=>$reviewer->id, 'level'=>'silver', 'status'=>'approved', 'reviewed_at'=>now(),
                'remarks'=>'Silver checks confirmed. Survey document #'.$data['survey_document_id']
                    .'; ownership document #'.$data['ownership_document_id'].".\n".$data['remarks'],
            ]);
            $property->verification_level = 'silver';
            $property->save();
        });
    }

    public function returnForCorrections(int $id, User $reviewer, string $remarks, bool $admin): void
    {
        DB::transaction(function () use ($id, $reviewer, $remarks, $admin) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, $admin ? ['submitted','under_review','approved','published'] : ['under_review']);
            $property->verifications()->create([
                'reviewer_id'=>$reviewer->id, 'level'=>'basic', 'status'=>'rejected',
                'remarks'=>$remarks, 'reviewed_at'=>now(),
            ]);
            $previousStatus = $property->status;
            $property->status = 'draft';
            $property->verification_level = 'unverified';
            $property->published_at = null;
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $reviewer, $remarks);
        });
    }

    public function approve(int $id, User $actor): void
    {
        DB::transaction(function () use ($id, $actor) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['under_review']);
            $this->verified($property);
            $this->complete($property);
            $previousStatus = $property->status;
            $property->status = 'approved';
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $actor);
        });
    }

    public function publish(int $id, User $actor): void
    {
        DB::transaction(function () use ($id, $actor) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['approved']);
            $this->verified($property);
            $this->complete($property);
            $previousStatus = $property->status;
            $property->status = 'published';
            $property->published_at = now();
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $actor);
        });
    }

    public function unpublish(int $id, User $actor, string $remarks): void
    {
        DB::transaction(function () use ($id, $actor, $remarks) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['published']);
            $property->status = 'approved';
            $property->published_at = null;
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, 'published', $actor, 'Unpublished: '.$remarks);
        });
    }

    public function markSold(int $id, User $actor): void
    {
        DB::transaction(function () use ($id, $actor) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['published']);
            $previousStatus = $property->status;
            $property->status = 'sold';
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $actor);
        });
    }

    public function archive(int $id, User $actor): void
    {
        DB::transaction(function () use ($id, $actor) {
            $property = Property::lockForUpdate()->findOrFail($id);
            $this->requireStatus($property, ['draft','submitted','under_review','approved','published','sold']);
            $previousStatus = $property->status;
            $property->status = 'archived';
            $property->published_at = null;
            $property->save();
            \App\Models\PropertyStatusHistory::record($property, $previousStatus, $actor);
        });
    }

    private function verified(Property $property): void
    {
        $review = $property->verifications()->latest('id')->first();
        if (!in_array($property->verification_level, ['basic','silver'], true) || $review?->level !== $property->verification_level || $review?->status !== 'approved' || ! $review->reviewed_at) {
            throw ValidationException::withMessages(['status'=>'Complete Basic verification before approving or publishing this listing.']);
        }
    }

    private function requireStatus(Property $property, array $statuses): void
    {
        if (! in_array($property->status, $statuses, true)) {
            throw ValidationException::withMessages(['status'=>'This action is unavailable for the current listing status. Refresh the page.']);
        }
    }

    private function complete(Property $property): void
    {
        app(PropertyCategoryFields::class)->validateComplete($property);
        Validator::make([
            'title'=>$property->title,'description'=>$property->description,'district'=>$property->district,
            'city'=>$property->city,'location'=>$property->location,'total_price'=>$property->total_price,
            'land_size_perches'=>$property->land_size_perches,'photos'=>$property->images()->count(),
        ], [
            'title'=>['required'],'description'=>['required'],'district'=>['required'],
            'city'=>['required'],'location'=>['required'],'total_price'=>['required','numeric','gt:0'],
            'land_size_perches'=>$property->category === 'land' ? ['required','numeric','gt:0'] : ['nullable'],
            'photos'=>['integer','min:1'],
        ], ['photos.min'=>'At least one photo is required.'])->validate();
    }
}
