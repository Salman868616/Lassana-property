<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegacyAccountController extends Controller
{
    public function createProperty(Request $request)
    {
        foreach (['admin', 'seller', 'agent'] as $role) {
            if ($request->user()->hasRole($role)) {
                return redirect()->route($role.'.properties.create', [], 303);
            }
        }

        return redirect()->route('account-profile', [], 303);
    }

    public function listings(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.properties.index');
        }
        foreach (['seller', 'agent'] as $role) {
            if ($request->user()->hasRole($role)) {
                return redirect()->route('dashboard.role', ['role'=>$role, 'tab'=>'properties']);
            }
        }

        return redirect()->route('account-profile');
    }

    public function favorites(Request $request)
    {
        return $request->user()->hasRole('buyer')
            ? redirect()->route('dashboard.role', ['role'=>'buyer', 'tab'=>'saved'])
            : redirect()->route('account-profile');
    }

    public function account()
    {
        return redirect()->route('account-profile');
    }
}
