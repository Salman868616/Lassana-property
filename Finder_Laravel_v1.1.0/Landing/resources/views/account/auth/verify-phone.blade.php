@extends('layouts.app')
@section('title', 'Verify mobile | Lassana Property')
@push('styles')
<style>
.lp-phone-verify {max-width:480px;margin:40px auto;padding:24px}
.lp-phone-verify .btn-primary {background:#8b1e24;border-color:#8b1e24}
.lp-phone-verify a {color:#8b1e24}
.lp-phone-code {letter-spacing:.4em;font-size:24px;text-align:center}
.lp-phone-verify .alert {font-size:.875rem;padding:12px 16px}
@media(max-width:575px){.lp-phone-verify {margin:16px auto;padding:20px}}
</style>
@endpush
@section('content')
<main class="lp-phone-verify">
    <img src="{{ asset('assets/img/lassana-property-logo.png') }}" width="100" height="90" style="object-fit:contain" alt="Lassana Property">
    <h1 class="h3 mt-4">{{ $user->hasVerifiedPhone() ? 'Confirm your sign-in' : 'Verify your mobile' }}</h1>
    <p>{{ $codePending ? 'Enter the six-digit SMS code sent to' : 'Request an SMS verification code for' }} <strong>{{ \App\Support\SriLankaMobile::masked($user->phone) }}</strong>.</p>
    @if(!$user->hasVerifiedPhone())<p class="small text-body-secondary">Your email is verified. Confirm a mobile number you can access. We will send an SMS code each time you sign in.</p>@endif
    @if(session('status'))<div class="alert alert-success" role="status">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger" role="alert">@foreach($errors->all() as $error)<p class="mb-1">{{ $error }}</p>@endforeach</div>@endif
    @if($codePending || $user->hasVerifiedPhone())
    <form method="POST" action="{{ route('phone-verification.verify') }}">
        @csrf
        <label for="sms-code" class="form-label">SMS verification code</label>
        <input id="sms-code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" pattern="[0-9]{6}" minlength="6" maxlength="6" class="form-control lp-phone-code mb-2" aria-describedby="sms-code-help" required autofocus>
        <p id="sms-code-help" class="small text-body-secondary">Codes expire after 10 minutes. Use only the most recent code.</p>
        <button class="btn btn-primary w-100" type="submit">Verify and continue</button>
    </form>
    @endif
    <form method="POST" action="{{ route('phone-verification.send') }}" class="mt-4">
        @csrf
        @if(!$user->hasVerifiedPhone())
        <label for="verification-phone" class="form-label">Mobile number</label>
        <input id="verification-phone" name="phone" type="tel" autocomplete="tel" value="{{ old('phone', $user->phone) }}" maxlength="30" class="form-control mb-2" aria-describedby="sms-phone-help" required>
        <p id="sms-phone-help" class="small text-body-secondary">Use your real Sri Lankan mobile number, for example 0771234567.</p>
        @endif
        <button class="btn btn-outline-secondary w-100" type="submit">{{ $codePending ? 'Send a new SMS code' : 'Send SMS code' }}</button>
        <p class="small text-body-secondary mt-2">Please wait one minute between requests.</p>
    </form>
    @if($user->hasVerifiedPhone())
    <p class="small text-body-secondary mt-4">Cannot access this number? Contact Lassana Property support for help recovering your account.</p>
    @endif
    <form method="POST" action="{{ route('logout') }}" class="mt-3 text-center">@csrf<button class="btn btn-link" type="submit">Log out</button></form>
</main>
@endsection
