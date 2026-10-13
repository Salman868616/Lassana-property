<?php

namespace App\Http\Controllers;

class RetiredTemplateController extends Controller
{
    public function show()
    {
        return response()->view('errors.retired-template', [], 410)
            ->header('X-Robots-Tag', 'noindex, nofollow');
    }
}
