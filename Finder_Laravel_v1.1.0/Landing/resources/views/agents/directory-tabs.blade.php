<nav aria-label="{{ __('Property directory') }}" class="d-flex flex-wrap gap-2 mb-4">
<a class="btn {{ $directoryTab === 'agents' ? 'btn-primary' : 'btn-outline-primary' }}" @if($directoryTab === 'agents') aria-current="page" @endif href="{{ route('agents.index') }}">{{ __('Agents') }}</a>
<a class="btn {{ $directoryTab === 'developers' ? 'btn-primary' : 'btn-outline-primary' }}" @if($directoryTab === 'developers') aria-current="page" @endif href="{{ route('developers.index') }}">{{ __('Developers') }}</a>
</nav>
