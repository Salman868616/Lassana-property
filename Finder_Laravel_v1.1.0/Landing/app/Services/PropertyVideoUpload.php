<?php
namespace App\Services;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyVideoUpload
{
    private ?string $newPath = null;
    private ?string $oldPath = null;

    public function validate(Request $request): array
    {
        return $request->validate([
            'video_url'=>['nullable','url:https','max:2048', function ($attribute, $value, $fail) {
                $parts = parse_url($value);
                if (! $parts || isset($parts['user']) || isset($parts['pass']) || isset($parts['port']) ||
                    ! in_array(strtolower($parts['host'] ?? ''), ['youtube.com','www.youtube.com','m.youtube.com','youtu.be','vimeo.com','www.vimeo.com'], true)) {
                    $fail('Use an HTTPS YouTube or Vimeo video link.');
                }
            }],
            'video'=>['nullable','file','mimes:mp4,webm','mimetypes:video/mp4,video/webm','max:51200'],
            'remove_video'=>['sometimes','boolean'],
        ]);
    }

    // Call inside the property's transaction, after its ID is assigned.
    public function save(Request $request, Property $property, array $data): void
    {
        if (array_key_exists('video_url', $data)) {
            $property->video_url = $data['video_url'];
        }
        if ($request->hasFile('video') || ($data['remove_video'] ?? false)) {
            $previous = $property->video_path;
            if ($previous && preg_match('#^property-videos/'.$property->id.'/[A-Za-z0-9]+\.(mp4|webm)$#', $previous)) {
                $this->oldPath = $previous;
            }
            $property->video_path = null;
            if ($request->hasFile('video')) {
                $path = $request->file('video')->store('property-videos/'.$property->id, 'local');
                if (! $path) throw new \RuntimeException('The video could not be stored.');
                $this->newPath = $path;
                $property->video_path = $path;
            }
        }
        if ($property->isDirty(['video_url', 'video_path'])) $property->save();
    }

    public function rollback(): void
    {
        if ($this->newPath) Storage::disk('local')->delete($this->newPath);
    }

    public function committed(): void
    {
        if ($this->oldPath) Storage::disk('local')->delete($this->oldPath);
    }
}
