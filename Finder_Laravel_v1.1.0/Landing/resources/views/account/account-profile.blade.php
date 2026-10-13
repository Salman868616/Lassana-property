@extends('layouts.app')
@section('title','My profile | Lassana Property')
@push('styles')
<style>
    .lp-profile .btn-primary,.lp-profile .list-group-item.active {background:#8B1E24;border-color:#8B1E24;color:#fff}
    .lp-profile .btn-primary:hover {background:#5A1015;border-color:#5A1015}
    .lp-profile a:not(.btn):not(.active) {color:#8B1E24}
    .lp-profile-avatar {width:64px;height:64px;background:#f8e9ea;color:#8B1E24}
</style>
@endpush
@section('content')
<div class="lp-profile">
    <header class="border-bottom bg-body">
        <div class="container d-flex flex-wrap align-items-center gap-3 py-3">
            <a href="{{ route('index') }}"><img src="{{ asset('assets/img/lassana-property-logo.png') }}" width="90" height="80" style="object-fit:contain" alt="Lassana Property"></a>
            <span class="fw-semibold">My account</span>
            <div class="ms-auto d-flex flex-wrap align-items-center gap-3">
                <a href="{{ route('dashboard') }}">My dashboard</a>
                <a href="{{ route('index') }}">View website</a>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-outline-secondary" type="submit">Log out</button></form>
            </div>
        </div>
    </header>
    <main class="content-wrapper container py-4 py-sm-5">
        <div class="row g-4 g-xl-5">
            <aside class="col-lg-3">
                <div class="border rounded p-4">
                    <div class="lp-profile-avatar rounded-circle d-flex align-items-center justify-content-center mb-3">@if($photoUrl = $user->profilePhotoUrl())<img src="{{ $photoUrl }}" class="rounded-circle w-100 h-100 object-fit-cover" alt="Your profile picture">@else<i class="fi-user fs-2" aria-hidden="true"></i>@endif</div>
                    <h2 class="h6 text-break">{{ $user->name }}</h2>
                    <p class="small text-body-secondary text-break">{{ $user->email }}</p>
                    <div class="d-flex flex-wrap gap-2 mb-4">@foreach($roles as $label)<span class="badge text-bg-secondary">{{ $label }}</span>@endforeach</div>
                    <nav class="list-group list-group-borderless" aria-label="Account navigation">
                        <a class="list-group-item list-group-item-action active rounded" href="{{ route('account-profile') }}" aria-current="page">My profile</a>
                        @foreach($roles as $key=>$label)<a class="list-group-item list-group-item-action" href="{{ route('dashboard.role',$key) }}">{{ $label }} dashboard</a>@endforeach
                        @if(isset($roles['buyer']))<a class="list-group-item list-group-item-action" href="{{ route('dashboard.role',['role'=>'buyer','tab'=>'saved']) }}">Saved properties</a>@endif
                    </nav>
                </div>
            </aside>
            <div class="col-lg-9">
                <h1 class="h2 mb-2">My profile</h1>
                
                @if($user->requiresRegistrationVerification())
                    <div class="alert alert-warning">Your email is not verified. <a href="{{ route('verification.notice') }}">Verify email</a></div>
                @endif
                @if(session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
                @if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                @unless(isset($roles['admin']) || isset($roles['sales']) || isset($roles['verification']))
                <section class="border rounded p-4 mb-4">
                    <h2 class="h5">Property account access</h2>
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                    @if(!$user->hasRole('seller'))
                        <form method="POST" action="{{ route('account.seller-access') }}">@csrf<button class="btn btn-outline-primary" type="submit">Start listing as a seller</button></form>
                    @else <a href="{{ route('dashboard.role','seller') }}">Seller dashboard</a> @endif
                    <a href="{{ route('account.agent-application') }}">{{ $user->hasRole('agent') ? 'Agent application history' : 'Agent application and status' }}</a>
                    </div>
                </section>
                @endunless
                <form method="POST" action="{{ route('account-profile.update') }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <section class="border rounded p-4 mb-4">
                        <h2 class="h5">Profile picture</h2>
                        <label class="form-label" for="profile-photo">Upload or replace your picture</label>
                        <input class="form-control" type="file" id="profile-photo" name="profile_photo" accept="image/jpeg,image/png,image/webp" aria-describedby="photo-help">
                        <p class="small text-body-secondary mt-2" id="photo-help">JPG, PNG or WebP · Up to 2 MB, 4096 × 4096 pixels. Click Save changes to upload.</p>
                        @error('profile_photo')<p class="text-danger" role="alert">{{ $message }}</p>@enderror
                        @if($user->profile_photo_path)
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="remove-photo" name="remove_profile_photo" value="1" @checked(old('remove_profile_photo'))><label class="form-check-label" for="remove-photo">Remove current picture</label></div>
                        <p class="small text-body-secondary mt-2 mb-0">Choosing a new picture replaces the current one, even if Remove is selected.</p>
                        @endif
                    </section>
                    <section class="border rounded p-4 mb-4">
                        <h2 class="h5 mb-4">Personal information</h2>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label" for="profile-name">Full name</label><input class="form-control" id="profile-name" name="name" value="{{ old('name',$user->name) }}" maxlength="255" autocomplete="name" required></div>
                            <div class="col-md-6"><label class="form-label" for="profile-email">Email address</label><input class="form-control" type="email" id="profile-email" name="email" value="{{ old('email',$user->email) }}" maxlength="255" autocomplete="email" required></div>
                            <div class="col-md-6"><label class="form-label" for="profile-phone">Phone number</label><input class="form-control" type="tel" id="profile-phone" name="phone" value="{{ old('phone',$user->phone) }}" maxlength="30" autocomplete="tel" @required(config('sms.enabled'))>
                                @if(config('sms.enabled'))<p class="small text-body-secondary mt-2">{{ $user->hasVerifiedPhone() ? 'Verified for SMS sign-in.' : 'Mobile verification required.' }} Changing this number requires verification again.</p>@endif
                            </div>
                            <div class="col-md-6"><label class="form-label" for="profile-city">City</label><input class="form-control" id="profile-city" name="city" value="{{ old('city',$user->city) }}" maxlength="100" autocomplete="address-level2"></div>
                            <div class="col-12"><label class="form-label" for="profile-bio">About me</label><textarea class="form-control" id="profile-bio" name="bio" rows="4" maxlength="2000">{{ old('bio',$user->bio) }}</textarea></div>
                        </div>
                    </section>
                    @if(isset($roles['agent']))
                    <section class="border rounded p-4 mb-4">
                        <h2 class="h5">Agent professional details</h2>
                        <p class="small text-body-secondary">Your picture, name, email, phone, city, biography and professional details appear on your public agent profile while your agent account is active.</p>
                        <a class="d-inline-block mb-3" href="{{ route('agents.show', $user) }}">View my public profile</a>
                        <label class="form-label" for="profile-agency">Agency or business name (optional)</label><input class="form-control mb-3" id="profile-agency" name="agency_name" maxlength="150" value="{{ old('agency_name',$user->agency_name) }}">
                        <label class="form-label" for="profile-areas">Areas you serve</label><input class="form-control" id="profile-areas" name="service_areas" maxlength="500" value="{{ old('service_areas',$user->service_areas) }}" placeholder="For example: Gampaha, Colombo">
                    </section>
                    @endif
                    <section class="border rounded p-4 mb-4">
                        <h2 class="h5">{{ config('sms.enabled') ? 'Confirm contact changes' : 'Confirm an email change' }}</h2>
                        <p class="small text-body-secondary" id="profile-password-help">Enter your current password only when changing your {{ config('sms.enabled') ? 'email or mobile number' : 'email' }}. Other sessions will need to sign in again.</p>
                        <label class="form-label" for="profile-password">Current password</label><input class="form-control" type="password" id="profile-password" name="current_password" autocomplete="current-password" aria-describedby="profile-password-help">
                    </section>
                    
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                @unless(isset($roles['admin']) || isset($roles['sales']) || isset($roles['verification']))
                <section class="border rounded p-4 mt-4" aria-labelledby="business-accounts-title">
                    <h2 class="h5" id="business-accounts-title">Business accounts</h2>
                    <p class="small text-body-secondary">For property development companies. Company registration is optional for individual buyers and sellers.</p>
                    <a href="{{ route('account.developer-application') }}">Register a property development company</a>
                </section>
                @endunless
            </div>
        </div>
    </main>
</div>
@endsection
@push('scripts')
@vite(['resources/js/app.js'])
@endpush
