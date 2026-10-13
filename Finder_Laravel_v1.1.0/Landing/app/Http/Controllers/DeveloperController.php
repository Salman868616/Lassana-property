<?php
namespace App\Http\Controllers;
use App\Models\Developer;
class DeveloperController extends Controller {
    public function index() {
        $developers = Developer::where('is_published',true)
            ->withCount(['properties'=>fn ($q) => $q->where('status','published')])->orderBy('name')->orderBy('id')->paginate(12);
        return view('developers.index', compact('developers'));
    }
    public function show(Developer $developer) {
        abort_unless($developer->is_published,404);
        $properties = $developer->properties()->where('status','published')->with(['images','details'])->orderByDesc('published_at')->orderByDesc('id')->paginate(6);
        return view('developers.show', compact('developer','properties'));
    }
}
