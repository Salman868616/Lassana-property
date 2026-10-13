@if($property->video_path || $property->video_url || (isset($role) && in_array($role, ['admin','seller','agent'], true) && $property->status === 'draft'))
<section class="card p-4 my-4">
    <h2 class="h5">{{ __('Property videos') }}</h2>
    @if($property->video_path)
        <video class="w-100 rounded mb-3" style="max-height:480px" controls preload="metadata" playsinline aria-label="Video of {{ $property->title }}">
            <source src="{{ route('property-videos.show', $property->id) }}">
            Your browser does not support video playback.
        </video>
    @endif
    @if($property->video_url)
        <p><a href="{{ $property->video_url }}" target="_blank" rel="noopener noreferrer">Watch property video on YouTube / Vimeo</a></p>
    @endif
    @if(isset($role) && in_array($role, ['admin','seller','agent'], true) && $property->status === 'draft')
        <a class="btn btn-outline-secondary align-self-start" href="{{ $role === 'admin' ? route('admin.properties.edit', $property) : route($role.'.properties.edit', $property->id) }}">Edit property media</a>
    @endif
</section>
@endif
