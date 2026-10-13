<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PublicPageController extends Controller {
    public function service(Request $request) {
        $page = config('public_pages.'.$request->route('page'));
        abort_unless($page,404);
        return view('pages.service',compact('page'));
    }
    public function legal(Request $request) {
        $title = match ($request->route()->getName()) {
            'terms-and-conditions'=>'Terms and conditions', 'privacy-policy'=>'Privacy policy', default=>'Disclaimer',
        };
        return view('pages.legal-pending',compact('title'));
    }
}
