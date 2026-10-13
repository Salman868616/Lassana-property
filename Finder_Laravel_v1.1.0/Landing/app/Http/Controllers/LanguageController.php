<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class LanguageController extends Controller {
    public function update(Request $request) {
        $data = $request->validate(['locale'=>['required','in:en,si,ta'],'return_path'=>['nullable','string','max:2000']]);
        $path = $data['return_path'] ?? '/';
        $decoded = rawurldecode($path);
        if (!str_starts_with($decoded,'/') || str_starts_with($decoded,'//') || str_contains($decoded,'\\') || preg_match('/[\x00-\x1f]/',$decoded)) $path='/';
        $request->session()->put('public_locale',$data['locale']);
        return redirect()->to($request->root().$path);
    }
}
