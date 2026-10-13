@extends('layouts.app')
@section('title', 'Forgot password?'.' | Lassana Property')
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
    .lp-signin-cover img {position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;z-index:-2}
    .lp-signin-cover::before {content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(8,24,20,.05) 20%,rgba(8,24,20,.92) 100%);z-index:-1}
    .lp-signin-cover-copy {padding:clamp(28px,4vw,64px);color:#fff}
    .lp-signin-cover-copy h2 {font-size:clamp(2rem,3.4vw,3.6rem);line-height:1.13;color:#fff;max-width:540px}
    .lp-signin-cover-copy p {max-width:420px;color:#f1f5f3}
    .lp-signin-tags {display:flex;flex-wrap:wrap;gap:10px;margin-top:28px}
    .lp-signin-tags span {border:1px solid rgba(255,255,255,.5);border-radius:30px;padding:8px 16px;font-size:.85rem}
    .lp-signin-help summary {cursor:pointer;color:#8b1e24}
    .lp-signin-footer {font-size:.8rem;padding-bottom:12px}
    .lp-signin .lp-recovery-message {font-size:.8125rem;line-height:1.5;padding:10px 14px;margin-bottom:16px}
    .lp-recovery-help {font-size:.8125rem;line-height:1.5}
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
            <h1 class="h2 mb-3" id="reset-title">{{ 'Forgot password?' }}</h1>
            @if($errors->any())
                <div class="alert alert-danger lp-recovery-message" role="alert"><ul class="mb-0 ps-3">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            @if(session('status'))<div class="alert alert-success lp-recovery-message" role="status">{{ session('status') }}</div>@endif
            <p class="text-body-secondary">Enter your email address to receive a password reset link.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <label for="recovery-email" class="form-label">Email address</label>
                    <input id="recovery-email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" autocomplete="email" maxlength="255" required>
                </div>
                <button class="btn btn-primary btn-lg w-100" type="submit">Send reset link</button>
                <p class="lp-recovery-help text-body-secondary mt-3 mb-0">Wait one minute before requesting another link.</p>
            </form>
        </div>
        <footer class="lp-signin-footer text-body-secondary">&copy; {{ date('Y') }} Lassana Property. All rights reserved.</footer>
    </section>
    <aside class="lp-signin-cover" aria-label="Explore Lassana Property">
        <picture>
            <source media="(min-width: 992px)" srcset="{{ asset('assets/img/account/auth-modern-home-20261012.webp') }}">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'/%3E" width="1122" height="1402" alt="A modern tropical home with a landscaped garden" decoding="async">
        </picture>
        <div class="lp-signin-cover-copy"><h2 class="mb-4">Your next chapter awaits.</h2><p>Get back to exploring land, houses, and apartments across Sri Lanka.</p></div>
    </aside>
</main>
@endsection
@push('scripts')
@vite(['resources/js/app.js'])
@endpush
