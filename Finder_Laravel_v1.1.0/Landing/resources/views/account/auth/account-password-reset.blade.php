@extends('layouts.app')
@section('title', 'Reset your password'.' | Lassana Property')
@push('styles')
<style>
    .lp-signin {min-height:100vh;display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);max-width:1680px;margin:auto;padding:24px;gap:32px}
    .lp-signin-panel {display:flex;flex-direction:column;min-width:0;padding:8px clamp(12px,4vw,72px)}
    .lp-signin-header {display:flex;align-items:center;justify-content:space-between;gap:20px}
    .lp-signin-logo {width:110px;height:100px;object-fit:contain}
    .lp-signin-form {width:100%;max-width:430px;margin:auto;padding:48px 0}
    .lp-signin a {color:#8b1e24}
    .lp-signin .btn-primary {background:#8b1e24;border-color:#8b1e24;color:white}
    .lp-signin .btn-primary:hover {background:#5a1015;border-color:#5a1015}
    .lp-signin .form-control:focus {border-color:#8b1e24;box-shadow:0 0 0 .2rem rgba(139,30,36,.12)}
    .lp-signin .form-check-input:checked {background-color:#8b1e24;border-color:#8b1e24}
    .lp-signin-eyebrow {color:#8b1e24;font-size:.75rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase}
    .lp-signin-cover {position:relative;isolation:isolate;overflow:hidden;border-radius:24px;min-height:640px;display:flex;align-items:flex-end;background:#173b32}
    .lp-signin-cover img {position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:65% center;z-index:-2}
    .lp-signin-cover::before {content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(8,24,20,.05) 20%,rgba(8,24,20,.92) 100%);z-index:-1}
    .lp-signin-cover-copy {padding:clamp(28px,4vw,64px);color:#fff}
    .lp-signin-cover-copy h2 {font-size:clamp(2rem,3.4vw,3.6rem);line-height:1.13;color:#fff;max-width:540px}
    .lp-signin-cover-copy p {max-width:420px;color:#f1f5f3}
    .lp-signin-tags {display:flex;flex-wrap:wrap;gap:10px;margin-top:28px}
    .lp-signin-tags span {border:1px solid rgba(255,255,255,.5);border-radius:30px;padding:8px 16px;font-size:.85rem}
    .lp-signin-help summary {cursor:pointer;color:#8b1e24}
    .lp-signin-footer {font-size:.8rem;padding-bottom:12px}
    @media(max-width:991.98px){.lp-signin {grid-template-columns:1fr;padding:16px;gap:0}.lp-signin-cover {display:none}.lp-signin-panel {padding:0 12px}.lp-signin-form {padding:36px 0}.lp-signin-logo {width:90px;height:80px}}
    @media(prefers-reduced-motion:reduce){.lp-signin * {scroll-behavior:auto!important}}
</style>
@endpush

@section('content')
<main class="lp-signin">
    <section class="lp-signin-panel" aria-labelledby="reset-title">
        <header class="lp-signin-header">
            <a href="{{ route('index') }}" aria-label="Lassana Property home"><img class="lp-signin-logo" src="{{ asset('assets/img/lassana-property-logo.png') }}" alt="Lassana Property"></a>
            <a class="small" href="{{ route('account-signin') }}">Back to sign in</a>
        </header>
        <div class="lp-signin-form">
            <p class="lp-signin-eyebrow">Your Lassana Property account</p>
            <h1 class="h2 mb-3" id="reset-title">{{ 'Reset your password' }}</h1>
            @if($errors->any())
                <div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            @if(session('status'))<div class="alert alert-success" role="status">{{ session('status') }}</div>@endif
            <p class="text-body-secondary">Choose a new password with at least 8 characters.</p>
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="mb-4">
        <label class="form-label" for="reset-email">Email address</label>
        <input class="form-control form-control-lg" id="reset-email" name="email" type="email" value="{{ old('email', $email) }}" autocomplete="email" maxlength="255" required>
    </div>
    <div class="mb-4">
        <label class="form-label" for="reset-password">New password</label>
        <div class="password-toggle">
            <input class="form-control form-control-lg" id="reset-password" name="password" type="password" autocomplete="new-password" minlength="8" required>
            <label class="password-toggle-button fs-lg"><input class="btn-check" type="checkbox" aria-label="Show new password"></label>
        </div>
    </div>
    <div class="mb-4">
        <label class="form-label" for="reset-confirmation">Confirm new password</label>
        <input class="form-control form-control-lg" id="reset-confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" required>
    </div>
    <button class="btn btn-primary btn-lg w-100" type="submit">Reset password</button>
</form>
<p class="small mt-3"><a href="{{ route('account-password-recovery') }}">Request a new reset link</a></p>
        </div>
        <footer class="lp-signin-footer text-body-secondary">&copy; {{ date('Y') }} Lassana Property. All rights reserved.</footer>
    </section>
    <aside class="lp-signin-cover" aria-label="Explore Lassana Property">
        <img src="{{ asset('assets/img/home/real-estate/hero/01.jpg') }}" alt="A modern home surrounded by greenery">
        <div class="lp-signin-cover-copy"><h2 class="mb-4">Your next chapter awaits.</h2><p>Get back to exploring land, houses, and apartments across Sri Lanka.</p></div>
    </aside>
</main>
@endsection
@push('scripts')
@vite(['resources/js/app.js'])
@endpush