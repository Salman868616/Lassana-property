<?php
namespace App\Http\Controllers;
class PropertyGuideController extends Controller {
    public function index() { return view('guides.index',['guides'=>config('property_guides')]); }
    public function show(string $guide) {
        $article=config('property_guides.'.$guide);
        abort_unless(is_array($article),404);
        return view('guides.show',compact('article'));
    }
}
