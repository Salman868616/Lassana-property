@if(in_array($role, ['admin','verification'], true) && in_array($property->status, ['under_review','approved','published'], true) && $property->verification_level === 'basic')
<section class="card p-4 mt-4">
    <h2 class="h5">Silver verification</h2>
    <p>Review the approved survey and ownership documents. Notes are visible to the seller.</p>
    <p class="small text-secondary">Missing documents? Ask admin to return the listing to draft for upload and review.</p>
    <form method="POST" action="{{ route('verification.properties.silver', $property) }}">
        @csrf
        @foreach(['survey'=>'Survey','ownership'=>'Ownership'] as $type=>$label)
            <label class="form-label" for="silver-{{ $type }}">Approved {{ strtolower($label) }} document</label>
            <select class="form-select mb-3" name="{{ $type }}_document_id" id="silver-{{ $type }}" required>
                <option value="">Select approved document</option>
                @foreach($property->documents->where('document_type', $type)->where('status','approved') as $document)
                    <option value="{{ $document->id }}" @selected(old($type.'_document_id') == $document->id)>{{ $label }} document #{{ $document->id }}</option>
                @endforeach
            </select>
            @error($type.'_document_id')<p class="text-danger">{{ $message }}</p>@enderror
        @endforeach
        @foreach(['survey_checked'=>'Survey checked against the property information','documents_checked'=>'Ownership documentation checked against the seller and property'] as $field=>$label)
            <div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="silver-{{ $field }}" name="{{ $field }}" value="1" @checked(old($field)) required><label class="form-check-label" for="silver-{{ $field }}">{{ $label }}</label></div>
        @endforeach
        <label class="form-label" for="silver-notes">Evidence checked and Silver review notes</label>
        <textarea class="form-control mb-3" id="silver-notes" name="remarks" rows="3" maxlength="5000" required>{{ old('remarks') }}</textarea>
        <p class="small text-secondary">Granting Silver does not approve or publish the listing.</p>
        <button class="btn btn-lp" type="submit">Confirm Silver verification</button>
    </form>
</section>
@endif
