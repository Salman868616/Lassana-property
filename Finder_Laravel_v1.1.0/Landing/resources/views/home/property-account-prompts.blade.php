@auth
    @foreach(['seller' => 'list a property', 'buyer' => 'request a property'] as $requiredRole => $action)
        @if(!auth()->user()->hasRole($requiredRole))
            <div class="modal fade" id="{{ $requiredRole }}-account-required" tabindex="-1" aria-labelledby="{{ $requiredRole }}-account-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="{{ $requiredRole }}-account-title">Use a {{ $requiredRole }} account</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ __('You are signed in as') }} <strong>{{ auth()->user()->name }}</strong>. This account does not have {{ $requiredRole }} access.</p>
                            <p>To {{ $action }}, sign out and sign in with your {{ $requiredRole }} account. You can manage your account access from My profile.</p>
                            <p class="small text-body-secondary mb-0">{{ __('You can continue browsing properties with your current account.') }}</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-outline-secondary" href="{{ route('account-profile') }}">{{ __('My profile') }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">{{ __('Sign out to switch accounts') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endauth
