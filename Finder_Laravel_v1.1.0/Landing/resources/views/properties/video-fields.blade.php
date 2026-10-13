<div class="mt-4 mb-3">
<h3 class="h6">Property video</h3>
            <label class="form-label" for="video-url">YouTube or Vimeo video link (optional)</label>
            <input class="form-control mb-3" id="video-url" name="video_url" type="url" maxlength="2048" value="{{ old('video_url', ($property->video_url ?? null)) }}" placeholder="https://www.youtube.com/watch?v=...">
            <label class="form-label" for="property-video">Upload video (optional)</label>
            <input class="form-control" id="property-video" name="video" type="file" accept="video/mp4,video/webm,.mp4,.webm" aria-describedby="video-help">
            <p class="small text-secondary mt-2" id="video-help">MP4 or WebM, up to 50 MB. A new upload replaces the current video. Leave the link blank to remove it.</p>
            @if($property->video_path ?? null)
                <div class="form-check mb-3"><input class="form-check-input" id="remove-video" type="checkbox" name="remove_video" value="1"><label class="form-check-label" for="remove-video">Remove uploaded video</label></div>
            @endif
<p class="small text-body-secondary">If validation fails, select the video file again.</p>
</div>
