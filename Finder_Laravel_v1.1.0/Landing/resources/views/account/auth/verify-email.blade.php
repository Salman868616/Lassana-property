@extends('layouts.app')
@section('title', 'Verify email | Lassana Property')
@push('styles')
<style>
.lp-email-verify {max-width:480px;margin:40px auto;padding:24px}
.lp-email-verify .btn-primary {background:#8b1e24;border-color:#8b1e24}
.lp-email-verify a {color:#8b1e24}
.lp-email-code {letter-spacing:.4em;font-size:24px;text-align:center}
</style>
@endpush
@section('content')
<main class="lp-email-verify">
    <img src="{{ asset('assets/img/lassana-property-logo.png') }}" width="100" height="90" style="object-fit:contain" alt="Lassana Property">
    <h1 class="h3 mt-4">Verify your email</h1>
    @if(config('sms.enabled'))<p class="small text-body-secondary">Verify your email first, then confirm your mobile with an SMS code.</p>@endif
    <p>{{ $codePending ? 'Enter the six-digit code sent to' : 'Request a verification code for' }} <strong class="text-break">{{ $user->email }}</strong>.</p>
    @if(session('status'))<div class="alert alert-success" role="status">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger" role="alert">@foreach($errors->all() as $error)<p class="mb-1">{{ $error }}</p>@endforeach</div>@endif
    <form method="POST" action="{{ route('verification.verify') }}">
        @csrf
        <label for="verification-code" class="form-label">Verification code</label>
        <input id="verification-code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" pattern="[0-9]{6}" minlength="6" maxlength="6" class="form-control lp-email-code mb-2" aria-describedby="code-help" required autofocus>
        <p id="code-help" class="small text-body-secondary">Codes expire after 10 minutes.</p>
        <button class="btn btn-primary w-100" type="submit">Verify email</button>
    </form>
    <form method="POST" action="{{ route('verification.send') }}" class="mt-3">
        @csrf
        <button class="btn btn-outline-secondary w-100" type="submit">{{ $codePending ? 'Send a new code' : 'Send verification code' }}</button>
    </form>
    @if(!session()->has('login_otp_challenge'))
    <details class="mt-4" @if($errors->has('email') || $errors->has('current_password')) open @endif>
        <summary>Correct email address</summary>
        <form method="POST" action="{{ route('verification.email') }}" class="mt-3">
            @csrf @method('PUT')
            <label for="corrected-email" class="form-label">Email address</label>
            <input id="corrected-email" name="email" type="email" value="{{ old('email', $user->email) }}" maxlength="255" autocomplete="email" class="form-control mb-3" required>
            <label for="verification-password" class="form-label">Current password</label>
            <input id="verification-password" name="current_password" type="password" autocomplete="current-password" class="form-control mb-3" required>
            <button type="submit" class="btn btn-outline-secondary w-100">Save email address</button>
        </form>
    </details>
    @endif
    <form method="POST" action="{{ route('logout') }}" class="mt-3 text-center">@csrf<button class="btn btn-link" type="submit">Log out</button></form>
</main>
@endsection
