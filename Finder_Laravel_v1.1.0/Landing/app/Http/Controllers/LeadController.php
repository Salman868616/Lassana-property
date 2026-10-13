<?php

namespace App\Http\Controllers;

use App\Models\CrmLead;
use App\Models\PropertyEnquiry;
use App\Models\User;
use App\Services\DashboardAccess;
use App\Services\LeadStages;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{


    private function query(Request $request, string $role)
    {
        abort_unless(in_array($role, ['admin','sales','agent'], true), 403);
        app(DashboardAccess::class)->authorize($request->user(), $role);
        return CrmLead::query()->when($role === 'agent', fn ($q) => $q->where('assigned_to', $request->user()->id));
    }

    private function activity(CrmLead $lead, Request $request, string $type, string $notes): void
    {
        $lead->activities()->create(['performed_by'=>$request->user()->id,'activity_type'=>$type,
            'status'=>$lead->status,'activity_at'=>now(),'notes'=>$notes]);
    }

    private function localTime(?string $value, string $field): ?CarbonImmutable
    {
        if (! $value) return null;
        $date = CarbonImmutable::createFromFormat('!Y-m-d\TH:i', $value, 'Asia/Colombo')->utc();
        if ($date->isPast()) throw ValidationException::withMessages([$field=>'Choose a future date and time.']);
        return $date;
    }

    public function show(Request $request, string $role, int $lead)
    {
        $lead = $this->query($request,$role)->with(['property','enquiry','assignee','propertyRequest.customer','buyerServiceRequest.customer'])->withExists('viewings')->findOrFail($lead);
        $roles = app(DashboardAccess::class)->roles($request->user());
        $title = 'Lead #'.$lead->id;
        $agents = in_array($role,['admin','sales'],true)
            ? User::where('is_active',true)->whereHas('roles',fn ($q)=>$q->whereIn('name',['agent','sales']))->orderBy('name')->get(['id','name']) : collect();
        $activities = $lead->activities()->with('performer')->latest('id')->paginate(20, ['*'], 'activity_page');
        $viewings = $lead->viewings()->with('assignee')->orderByDesc('scheduled_at')->paginate(10, ['*'], 'viewings_page');
        $matches=$lead->propertyRequest?->matches()->orderBy('total_price')->orderBy('id')->paginate(10,['*'],'matches_page');
        $needsViewingFollowUp = $lead->status === 'viewing_scheduled'
            && !$lead->viewings()->where('status','scheduled')->where('scheduled_at','>=',now())->exists()
            && $lead->viewings()->where('status','cancelled')->exists();
        return view('dashboard.lead',compact('needsViewingFollowUp','matches','lead','role','roles','title','agents','activities','viewings'));
    }

    public function convert(Request $request, string $role, int $enquiry)
    {
        abort_unless(in_array($role,['admin','sales'],true),403);
        $this->query($request,$role);
        $lead = DB::transaction(function () use ($enquiry,$request) {
            $enquiry = PropertyEnquiry::lockForUpdate()->findOrFail($enquiry);
            $lead = $enquiry->crmLead()->first();
            if (! $lead) {
                $lead = $enquiry->crmLead()->create(['property_id'=>$enquiry->property_id,'status'=>'new','source'=>'website']);
                $this->activity($lead,$request,'created','Lead created from enquiry #'.$enquiry->id.'.');
            }
            return $lead;
        });
        return redirect()->route('leads.show',['role'=>$role,'lead'=>$lead->id]);
    }

    public function assign(Request $request, string $role, int $lead)
    {
        abort_unless(in_array($role,['admin','sales'],true),403);
        $this->query($request,$role)->findOrFail($lead);
        $data = $request->validate(['assigned_to'=>['nullable','integer']]);
        DB::transaction(function () use ($request,$role,$lead,$data) {
            $lead = $this->query($request,$role)->lockForUpdate()->findOrFail($lead);
            $agent = null;
            if ($data['assigned_to'] ?? null) {
                $agent = User::where('is_active',true)->whereHas('roles',fn ($q)=>$q->whereIn('name',['agent','sales']))->find($data['assigned_to']);
                if (! $agent) throw ValidationException::withMessages(['assigned_to'=>'Choose an active agent or sales employee.']);
            }
            $previous = $lead->assigned_to;
            $lead->assigned_to = $agent?->id;
            $lead->save();
            $lead->viewings()->where('status','scheduled')->update(['assigned_to'=>$agent?->id]);
            $this->activity($lead,$request,'assignment','Assignment changed from '.($previous ?? 'unassigned').' to '.($agent ? $agent->name.' (#'.$agent->id.')' : 'unassigned').'.');
        });
        return back()->with('success','Lead assignment saved. Scheduled viewings use the same assignment.');
    }

    public function update(Request $request, string $role, int $lead)
    {
        $this->query($request,$role)->findOrFail($lead);
        $data = $request->validate([
            'status'=>['required','in:'.implode(',',array_keys(LeadStages::LABELS))],
            'activity_type'=>['required','in:note,call,email,meeting'],
            'notes'=>['required','string','max:5000'],
            'source'=>['sometimes','required','in:'.implode(',',array_keys(LeadStages::SOURCES))],
            'outcome'=>['nullable','required_if:status,closed','in:'.implode(',',array_keys(LeadStages::OUTCOMES))],
            'follow_up_at'=>['nullable','date_format:Y-m-d\TH:i'],
        ]);
        $terminal=in_array($data['status'],['converted','closed'],true);
        $followUp = $terminal ? null : $this->localTime($data['follow_up_at'] ?? null,'follow_up_at');
        DB::transaction(function () use ($request,$role,$lead,$data,$followUp,$terminal) {
            $lead = $this->query($request,$role)->lockForUpdate()->findOrFail($lead);
            if ($data['status']==='viewing_scheduled' && !$lead->viewings()->where('status','scheduled')->where('scheduled_at','>=',now())->exists()) {
                throw ValidationException::withMessages(['status'=>'Schedule an upcoming viewing before choosing Viewing Scheduled.']);
            }
            $previous=LeadStages::label($lead->status);
            $oldSource=$lead->source;
            $lead->status=$data['status'];
            $lead->follow_up_at=$followUp;
            $lead->notes=$data['notes'];
            $lead->source=$data['source'] ?? $lead->source;
            $lead->outcome=$data['status']==='converted' ? 'converted' : ($data['status']==='closed' ? $data['outcome'] : null);
            if (!$lead->first_contacted_at && in_array($data['activity_type'],['call','email','meeting'],true)) $lead->first_contacted_at=now();
            $lead->save();
            $summary=$previous.' → '.LeadStages::label($lead->status).'.';
            if ($lead->outcome) $summary.=' Outcome: '.LeadStages::OUTCOMES[$lead->outcome].'.';
            if ($oldSource!==$lead->source) $summary.=' Source: '.$oldSource.' → '.$lead->source.'.';
            $this->activity($lead,$request,$data['activity_type'],$summary."\n".$data['notes']);
        });
        return back()->with('success','Follow-up recorded. No email or message was sent automatically.');
    }
    public function schedule(Request $request, string $role, int $lead)
    {
        $this->query($request,$role)->findOrFail($lead);
        $data = $request->validate(['scheduled_at'=>['required','date_format:Y-m-d\TH:i'],'notes'=>['nullable','string','max:5000']]);
        $date = $this->localTime($data['scheduled_at'],'scheduled_at');
        DB::transaction(function () use ($request,$role,$lead,$data,$date) {
            $lead = $this->query($request,$role)->lockForUpdate()->findOrFail($lead);
            if (! $lead->property || $lead->property->status !== 'published') {
                throw ValidationException::withMessages(['scheduled_at'=>'Viewings require a published property.']);
            }
            if (in_array($lead->status,['converted','closed'],true)) {
                throw ValidationException::withMessages(['status'=>'Reopen the lead before scheduling a viewing.']);
            }
            if (! $lead->assignee?->is_active || !($lead->assignee->hasRole('agent') || $lead->assignee->hasRole('sales'))) throw ValidationException::withMessages(['assigned_to'=>'Assign an active agent or sales employee before scheduling a viewing.']);
            if ($lead->viewings()->where('status','scheduled')->where('scheduled_at',$date)->exists()) {
                throw ValidationException::withMessages(['scheduled_at'=>'This lead already has a viewing at that time.']);
            }
            $lead->viewings()->create(['property_id'=>$lead->property_id,'customer_id'=>$lead->enquiry?->customer_id ?? $lead->propertyRequest?->customer_id ?? $lead->buyerServiceRequest?->customer_id,
                'assigned_to'=>$lead->assigned_to,'scheduled_at'=>$date,'status'=>'scheduled','notes'=>$data['notes'] ?? null]);
            $lead->status='viewing_scheduled'; $lead->save();
            $this->activity($lead,$request,'viewing_scheduled','Viewing scheduled for '.$date->setTimezone('Asia/Colombo')->format('d M Y h:i A').'.');
        });
        return back()->with('success','Viewing scheduled. Please confirm the appointment with the customer separately.');
    }

    public function matchProperty(Request $request, string $role, int $lead)
    {
        $this->query($request,$role)->findOrFail($lead);
        $data=$request->validate(['property_id'=>['required','integer']]);
        DB::transaction(function () use ($request,$role,$lead,$data) {
            $lead=$this->query($request,$role)->lockForUpdate()->findOrFail($lead);
            abort_unless($lead->propertyRequest,404);
            if (!in_array($lead->status,LeadStages::OPEN,true)) {
                throw ValidationException::withMessages(['property_id'=>'Reopen the lead before selecting a property.']);
            }
            if ($lead->viewings()->exists()) {
                throw ValidationException::withMessages(['property_id'=>'The selected property cannot change after a viewing has been recorded.']);
            }
            $property=$lead->propertyRequest->matches()->whereKey($data['property_id'])->lockForUpdate()->first();
            if (!$property) throw ValidationException::withMessages(['property_id'=>'Choose a published property matching the request requirements.']);
            if ($lead->property_id===$property->id) return;
            $previous=$lead->property_id;
            $lead->property_id=$property->id;
            $lead->save();
            $this->activity($lead,$request,'property_match','Selected '.$property->property_code.' for property request #'.$lead->property_request_id.'. Previous property: '.($previous ?? 'none').'.');
        });
        return back()->with('success','Property selected. You can now arrange a viewing with the customer.');
    }

    public function viewingOutcome(Request $request, string $role, int $lead, int $viewing)
    {
        $this->query($request,$role)->findOrFail($lead);
        $data = $request->validate(['status'=>['required','in:completed,cancelled,no_show'],'outcome'=>['required','string','max:5000']]);
        DB::transaction(function () use ($request,$role,$lead,$viewing,$data) {
            $lead=$this->query($request,$role)->lockForUpdate()->findOrFail($lead);
            $viewing=$lead->viewings()->lockForUpdate()->findOrFail($viewing);
            if ($viewing->status !== 'scheduled') throw ValidationException::withMessages(['status'=>'This viewing already has an outcome.']);
            if ($data['status'] !== 'cancelled' && $viewing->scheduled_at->isFuture()) {
                throw ValidationException::withMessages(['status'=>'A future viewing can only be cancelled.']);
            }
            $viewing->update($data);
            $this->activity($lead,$request,'viewing_outcome','Viewing #'.$viewing->id.' '.$data['status'].': '.$data['outcome']);
        });
        return back()->with('success','Viewing outcome recorded.');
    }
}
