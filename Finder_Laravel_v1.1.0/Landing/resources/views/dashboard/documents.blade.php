@if($property->relationLoaded('documents'))
<section class="card p-4 mb-4">
    <h2 class="h5">Private property documents</h2>
    <p class="text-secondary">Private files: accessible to the owner, assigned agent, admin and verification team.</p>
    @forelse($property->documents as $document)
        <div class="d-flex flex-wrap justify-content-between gap-2 border-bottom py-3">
            <span>{{ ucfirst($document->document_type) }} — {{ ucfirst($document->status) }}</span>
            <a href="{{ route('property-documents.download', ['role'=>$role, 'property'=>$property->id, 'document'=>$document->id]) }}">Download document {{ $document->id }}</a>
        </div>
        @if($document->review)
            <div class="pb-3">
                <small class="text-secondary">Reviewed by {{ $document->review->reviewer?->name ?? 'Former staff member' }} on {{ $document->review->created_at->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') }}</small>
                <p class="mb-0" style="white-space: pre-line">{{ $document->review->remarks }}</p>
                @if($document->status === 'rejected')
                    <p class="small mt-2">Return the listing to draft to upload a corrected document.</p>
                @endif
            </div>
        @endif
        @if(in_array($role, ['admin','verification'], true) && $property->status === 'under_review' && $document->status === 'pending')
            <form class="border rounded p-3 mb-3" method="POST" action="{{ route('property-documents.review', ['role'=>$role,'property'=>$property->id,'document'=>$document->id]) }}">
                @csrf
                <label for="document-notes-{{ $document->id }}" class="form-label">Review notes (visible to seller)</label>
                <textarea id="document-notes-{{ $document->id }}" name="remarks" class="form-control mb-2" maxlength="5000" required></textarea>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="evidence_checked" value="1" id="document-checked-{{ $document->id }}" required>
                    <label class="form-check-label" for="document-checked-{{ $document->id }}">I have checked this document or confirmed why it cannot be accepted.</label>
                </div>
                <button class="btn btn-lp" name="decision" value="approved" type="submit">Approve document</button>
                <button class="btn btn-outline-danger" name="decision" value="rejected" type="submit">Reject document</button>
                <p class="small text-secondary mt-2 mb-0">Document decisions are final and separate from property approval. Return to draft for corrections.</p>
            </form>
        @endif
    @empty
        <p class="text-secondary">No documents uploaded yet.</p>
    @endforelse
    @if(in_array($role, ['seller','agent'], true) && $property->status === 'draft')
        <form class="mt-3" method="POST" enctype="multipart/form-data" action="{{ route($role.'.documents.store', $property->id) }}">
            @csrf
            <label for="document-type" class="form-label">Document type</label>
            <select id="document-type" name="document_type" class="form-select mb-3" required>
                @foreach(['ownership'=>'Ownership document', 'survey'=>'Survey plan', 'identity'=>'Identity document', 'other'=>'Other supporting document'] as $value=>$label)
                    <option value="{{ $value }}" @selected(old('document_type') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <label for="property-document" class="form-label">Choose document</label>
            <input id="property-document" class="form-control" type="file" name="document" accept=".pdf,.jpg,.jpeg,.png" required aria-describedby="document-help">
            <p id="document-help" class="small text-secondary mt-2">PDF, JPG or PNG. Maximum 10 MB per file and 10 documents per property. Uploading does not mark a document as verified.</p>
            <button class="btn btn-lp" type="submit">Upload private document</button>
        </form>
    @elseif(in_array($role, ['seller','agent'], true))
        <p class="small text-secondary mt-3 mb-0">Uploads are locked. Ask admin to return the listing to draft for corrections.</p>
    @endif
</section>
@endif
