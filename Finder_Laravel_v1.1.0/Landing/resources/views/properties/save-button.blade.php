@if(session('saved_message'))<div class="alert alert-success" role="status">{{ session('saved_message') }}</div>@endif
<div class="mb-4">
@auth
    @if(auth()->user()->hasRole('buyer'))
        <div class="d-flex flex-wrap align-items-center gap-3">
            <form method="POST" action="{{ route($saved ? 'buyer.saved.destroy' : 'buyer.saved.store',$property->id) }}">
                @csrf
                @if($saved) @method('DELETE') @endif
                <button class="btn btn-outline-primary" type="submit"><i class="fi-heart me-2" aria-hidden="true"></i>{{ __($saved ? 'Remove from saved' : 'Save property') }}</button>
            </form>
            @if($saved)<span>{{ __('Saved') }}</span>@endif
            <a href="{{ route('dashboard.role',['role'=>'buyer','tab'=>'saved']) }}">My saved properties</a>
        </div>
    @else
        <p class="small text-body-secondary">Saving properties is available with buyer access.</p>
    @endif
@else
    <a class="btn btn-outline-primary" href="{{ route('account-signin') }}">Sign in to save properties</a>
@endauth
</div>
