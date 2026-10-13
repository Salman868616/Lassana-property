@extends('layouts.app')
@section('title', 'Create an account | Lassana Property')
@push('styles')
<style>
    .lp-signin {min-height:100vh;display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);max-width:1680px;margin:auto;padding:24px;gap:32px}
    .lp-signin-panel {display:flex;flex-direction:column;min-width:0;padding:8px clamp(12px,3vw,56px)}
    .lp-signin-header {display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
    .lp-signin-logo {width:110px;height:100px;object-fit:contain}
    .lp-signin-form {width:100%;max-width:540px;margin:auto;padding:28px 0 32px}
    .lp-signin a {color:#8b1e24}
    .lp-auth-tabs {display:grid;grid-template-columns:repeat(2,minmax(0,1fr));margin-bottom:28px;border:1px solid var(--fn-border-color,#dee2e6);border-radius:8px;overflow:hidden}
    .lp-auth-tabs a {display:flex;align-items:center;justify-content:center;min-height:48px;padding:12px 16px;color:#4d4545;font-weight:600;text-decoration:none;text-align:center}
    .lp-auth-tabs a + a {border-left:1px solid var(--fn-border-color,#dee2e6)}
    .lp-auth-tabs a[aria-current="page"] {background:#8b1e24;color:white}
    .lp-auth-tabs a:not([aria-current="page"]):hover {background:#fbf7f0;color:#8b1e24}
    .lp-auth-tabs a:focus-visible {outline:3px solid #c89b3c;outline-offset:-4px}
    .lp-signin .btn-primary {background:#8b1e24;border-color:#8b1e24;color:white}
    .lp-signin .btn-primary:hover {background:#5a1015;border-color:#5a1015}
    .lp-signin .form-control:focus,.lp-signin .form-select:focus {border-color:#8b1e24;box-shadow:0 0 0 .2rem rgba(139,30,36,.12)}
    .lp-signin .form-check-input:checked {background-color:#8b1e24;border-color:#8b1e24}
    .lp-signin-form .mb-4 {margin-bottom:18px!important}
    .lp-signin-form .form-control,.lp-signin-form .form-select {min-height:48px;font-size:1rem}
    .lp-auth-passwords {display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
    .lp-auth-passwords > div {min-width:0}
    .lp-signin-cover {position:sticky;top:24px;align-self:start;isolation:isolate;overflow:hidden;border-radius:24px;min-height:640px;height:calc(100vh - 48px);display:flex;align-items:flex-end;background:#173b32}
    .lp-signin-cover img {position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;z-index:-2}
    .lp-signin-cover::before {content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(8,24,20,.05) 20%,rgba(8,24,20,.92) 100%);z-index:-1}
    .lp-signin-cover-copy {padding:clamp(28px,4vw,64px);color:#fff}
    .lp-signin-cover-copy h2 {font-size:clamp(2rem,3.4vw,3.6rem);line-height:1.13;color:#fff;max-width:540px}
    .lp-signin-cover-copy p {max-width:420px;color:#f1f5f3}
    .lp-signin-tags {display:flex;flex-wrap:wrap;gap:10px;margin-top:28px}
    .lp-signin-tags span {border:1px solid rgba(255,255,255,.5);border-radius:30px;padding:8px 16px;font-size:.85rem}
    .lp-signin-footer {font-size:.8rem;padding-bottom:12px}
    @media(max-width:991.98px){.lp-signin {grid-template-columns:1fr;padding:16px;gap:0}.lp-signin-cover {display:none}.lp-signin-panel {padding:0 12px}.lp-signin-form {padding:24px 0}.lp-signin-logo {width:90px;height:80px}}
    @media(max-width:575.98px){.lp-auth-passwords {grid-template-columns:1fr;gap:0}.lp-auth-tabs {margin-bottom:24px}.lp-signin-panel {padding:0 4px}}
    @media(prefers-reduced-motion:reduce){.lp-signin * {scroll-behavior:auto!important}}
</style>
@endpush
@section('content')
<main class="lp-signin">
    <section class="lp-signin-panel" aria-labelledby="signup-title">
        <header class="lp-signin-header">
            <a href="{{ route('index') }}" aria-label="Lassana Property home"><img class="lp-signin-logo" src="{{ asset('assets/img/lassana-property-logo.png') }}" alt="Lassana Property"></a>
            <a class="small text-decoration-none" href="{{ route('index') }}"><i class="fi-arrow-left me-2" aria-hidden="true"></i>Back to home</a>
        </header>
        <div class="lp-signin-form">
            <nav class="lp-auth-tabs" aria-label="Account access">
    <a href="{{ route('account-signup') }}" @if(request()->routeIs('account-signup')) aria-current="page" @endif>Register</a>
    <a href="{{ route('account-signin') }}" @if(request()->routeIs('account-signin')) aria-current="page" @endif>Sign in</a>
</nav>
            <h1 class="h2 mb-3" id="signup-title">Create your account</h1>
            <p class="text-body-secondary mb-4">Start your property journey with Lassana Property.</p>
<form method="POST" action="{{ route('register.store') }}">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-4">
        <label for="account-type" class="form-label">Account type</label>
        <select id="account-type" name="account_type" class="form-select form-select-lg">
            @foreach(['buyer'=>'Buyer','seller'=>'Seller','agent'=>'Agent (admin approval required)'] as $value=>$label)
            <option value="{{ $value }}" @selected(old('account_type',request('account_type','buyer'))===$value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="register-name" class="form-label">Full name</label>
        <input
            type="text"
            name="name"
            id="register-name"
            class="form-control form-control-lg"
            value="{{ old('name') }}"
            maxlength="255"
            autocomplete="name"
            required
        >
    </div>

    <div class="mb-4">
        <label for="register-email" class="form-label">Email address</label>
        <input
            type="email"
            name="email"
            id="register-email"
            class="form-control form-control-lg"
            value="{{ old('email') }}"
            maxlength="255"
            autocomplete="email"
            required
        >
    </div>

    @if(config('sms.enabled'))
    <div class="mb-4">
        <label for="register-phone" class="form-label">Mobile number</label>
        <input type="tel" name="phone" id="register-phone" class="form-control form-control-lg" value="{{ old('phone') }}" maxlength="30" autocomplete="tel" aria-describedby="register-phone-help" required>
        <p id="register-phone-help" class="small text-body-secondary mt-2 mb-0">Use a Sri Lankan mobile number you can access. Verify your email and mobile to register; use an SMS code each time you sign in.</p>
    </div>
    @endif

    <div class="lp-auth-passwords">
    <div class="mb-4">
        <label for="register-password" class="form-label">Password</label>
        <input
            type="password"
            name="password"
            id="register-password"
            class="form-control form-control-lg"
            minlength="8"
            placeholder="Minimum 8 characters"
            autocomplete="new-password"
            required
        >
    </div>

    <div class="mb-4">
        <label for="register-password-confirmation" class="form-label">
            Confirm password
        </label>
        <input
            type="password"
            name="password_confirmation"
            id="register-password-confirmation"
            class="form-control form-control-lg"
            minlength="8"
            autocomplete="new-password"
            required
        >
    </div>

    </div>

    <fieldset id="agent-signup-fields" class="mb-4" @if(old('account_type',request('account_type','buyer'))!=='agent') hidden disabled @endif>
        <legend class="h6">Agent application</legend>
        @include('account.auth.agent-fields',['fieldPrefix'=>'register-agent', 'hidePhone'=>config('sms.enabled')])
        <p class="small text-body-secondary">Agent access starts after admin approval.</p>
    </fieldset>
    <div class="form-check mb-4">
        <input
            type="checkbox"
            name="terms"
            value="1"
            id="register-terms"
            class="form-check-input"
            @checked(old('terms'))
            required
        >
        <label for="register-terms" class="form-check-label">
            I accept the
            <a href="{{ route('terms-and-conditions') }}" target="_blank"
               rel="noopener">Terms and Conditions</a>.
        </label>
    </div>

    <button type="submit" class="btn btn-lg btn-primary w-100">
        Create an account
    </button>
</form>
            <div class="border-top mt-4 pt-4">
                <p class="mb-0">Already have an account? <a class="fw-semibold" href="{{ route('account-signin') }}">Sign in</a></p>
            </div>
        </div>
        <footer class="lp-signin-footer text-body-secondary">&copy; {{ date('Y') }} Lassana Property. All rights reserved.</footer>
    </section>
    <aside class="lp-signin-cover" aria-label="Explore Lassana Property">
        <picture>
            <source media="(min-width: 992px)" srcset="{{ asset('assets/img/account/auth-modern-home-20261012.webp') }}">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'/%3E" width="1122" height="1402" alt="A modern tropical home with a landscaped garden" decoding="async">
        </picture>
        <div class="lp-signin-cover-copy">
            <h2 class="mb-4">Your next chapter starts here.</h2>
            <p class="mb-0">Discover properties, list your own, or apply to join our agent network.</p>
            <div class="lp-signin-tags" aria-label="Property categories"><span>Land</span><span>Houses</span><span>Apartments</span></div>
        </div>
    </aside>
</main>
@endsection
@push('scripts')
@vite(['resources/js/app.js'])
<script>
const accountType = document.getElementById('account-type');
const agentFields = document.getElementById('agent-signup-fields');
function updateAgentFields() {
    agentFields.hidden = accountType.value !== 'agent';
    agentFields.disabled = accountType.value !== 'agent';
    agentFields.querySelectorAll('[name="phone"],[name="service_areas"],[name="bio"]').forEach(field => field.required = !agentFields.hidden);
}
accountType.addEventListener('change', updateAgentFields);
updateAgentFields();
</script>
@endpush
