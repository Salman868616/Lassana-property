@if(in_array($role, ['admin', 'seller', 'agent', 'verification'], true))
<div class="alert alert-info mt-4" role="status">
    <strong>Next step:</strong>
    {{ match($property->status) {
        'draft' => 'The seller, assigned agent or admin completes the draft and submits it for review.',
        'submitted' => 'Admin reviews the submission and sends it to the Verification Team.',
        'under_review' => $property->verification_level === 'unverified'
            ? 'The Verification Team checks seller identity, property information and photos, then confirms verification or returns the property for corrections.'
            : 'Verification is complete. Admin must approve the listing before publishing.',
        'approved' => 'Admin can now publish this property on the public website.',
        'published' => 'This property is public. Admin can mark it as sold once the sale is confirmed.',
        'sold' => 'This property is sold and no longer listed publicly. Admin can archive it for reference.',
        'archived' => 'This property is archived and retained for reference.',
        default => 'No review action is currently required.'
    } }}
</div>
@endif

@if(in_array($role, ['admin', 'seller', 'agent', 'verification'], true))
<section class="card p-4 mt-4">
    <h2 class="h5">Review history and feedback</h2>
    @forelse($property->verifications as $review)
        <div class="border-bottom py-3">
            <strong>{{ ucfirst($review->status) }} — {{ ucfirst($review->level) }}</strong>
            <small class="d-block text-secondary">{{ ($review->reviewed_at ?? $review->created_at)?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') }}</small>
            <p class="mb-0" style="white-space: pre-line">{{ $review->remarks }}</p>
        </div>
    @empty
        <p class="text-secondary mb-0">No reviews recorded yet.</p>
    @endforelse
</section>
@endif

@if($role === 'admin' && in_array($property->status, ['submitted', 'under_review', 'approved', 'published', 'sold'], true))
<section class="card p-4 mt-4">
    <h2 class="h5">Admin review</h2>
    @if($property->status === 'submitted')
        <p>Check the submission, then send it to verification.</p>
        <form method="POST" action="{{ route('admin.properties.start-review', $property) }}">@csrf<button class="btn btn-lp" type="submit">Send to verification</button></form>
    @elseif($property->status === 'under_review' && in_array($property->verification_level, ['basic','silver'], true))
        <form method="POST" action="{{ route('admin.properties.approve', $property) }}">@csrf<button class="btn btn-lp" type="submit">Approve listing</button></form>
    @elseif($property->status === 'published')
        <p>Once the sale is confirmed, mark this property as sold to remove it from public listings.</p>
        <form method="POST" action="{{ route('admin.properties.mark-sold', $property) }}">
            @csrf
            <button class="btn btn-lp" type="submit">Mark as sold</button>
        </form>
        <form class="mt-4" method="POST" action="{{ route('admin.properties.unpublish', $property) }}">
            @csrf
            <label class="form-label" for="unpublish-reason">Reason for unpublishing (visible to the seller)</label>
            <textarea class="form-control mb-2" id="unpublish-reason" name="remarks" rows="2" maxlength="5000" required>{{ old('remarks') }}</textarea>
            <p class="small text-secondary">Hide this listing from the public website while keeping its approval. To change property details, use Return to draft for corrections.</p>
            <button class="btn btn-outline-secondary" type="submit">Unpublish property</button>
        </form>
    @elseif($property->status === 'sold')
        <p class="mb-0">Sale confirmed. You can archive this property using the section below.</p>
    @elseif($property->status === 'approved')
        <p>Publishing makes this listing visible on the public website.</p>
        <form method="POST" action="{{ route('admin.properties.publish', $property) }}">@csrf<button class="btn btn-lp" type="submit">Publish listing</button></form>
    @endif
    @if(in_array($property->status, ['submitted','under_review','approved','published'], true))
        <form class="mt-3" method="POST" action="{{ route('admin.properties.return-to-draft', $property) }}">
            @csrf
            <label for="admin-feedback" class="form-label">Corrections needed (visible to the seller)</label>
            <textarea id="admin-feedback" name="remarks" class="form-control mb-2" rows="3" maxlength="5000" required>{{ old('remarks') }}</textarea>
            <button class="btn btn-outline-secondary" type="submit">Return to draft for corrections</button>
        </form>
    @endif
</section>
@endif

@if(in_array($role, ['admin', 'verification'], true) && $property->status === 'under_review' && $property->verification_level === 'unverified')
<section class="card p-4 mt-4">
    <h2 class="h5">Basic verification</h2>
    <p>Confirm each check only after reviewing the evidence. Your notes are visible to the seller.</p>
    <form method="POST" action="{{ route('verification.properties.approve', $property) }}">
        @csrf
        @foreach(['identity_checked'=>'Seller identity checked','information_checked'=>'Property information checked','photos_checked'=>'Property photos checked'] as $field=>$label)
            <div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" @checked(old($field)) required><label class="form-check-label" for="{{ $field }}">{{ $label }}</label></div>
        @endforeach
        <label class="form-label" for="review-notes">Evidence checked and review notes</label>
        <textarea class="form-control mb-3" id="review-notes" name="remarks" rows="3" maxlength="5000" required>{{ old('remarks') }}</textarea>
        <button class="btn btn-lp" type="submit">Confirm Basic verification</button>
    </form>
    @if($role === 'verification')
    <form class="mt-4" method="POST" action="{{ route('verification.properties.reject', $property) }}">
        @csrf
        <label class="form-label" for="verification-feedback">Corrections needed</label>
        <textarea class="form-control mb-2" id="verification-feedback" name="remarks" rows="3" maxlength="5000" required>{{ old('remarks') }}</textarea>
        <button class="btn btn-outline-secondary" type="submit">Return to seller for corrections</button>
    </form>
    @endif
</section>
@endif

@include('dashboard.silver-verification')
