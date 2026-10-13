@if($paginator->hasPages())
<nav class="d-flex flex-wrap justify-content-center align-items-center gap-1" aria-label="Property pages">
    @foreach($elements as $element)
        @if(is_string($element))
            <span class="px-2 text-secondary" aria-hidden="true">{{ $element }}</span>
        @else
            @foreach($element as $page => $url)
                <a class="lp-page-dot" href="{{ $url }}#property-results" aria-label="Property page {{ $page }}" title="Page {{ $page }}" @if($page === $paginator->currentPage()) aria-current="page" @endif><span class="visually-hidden">{{ $page }}</span></a>
            @endforeach
        @endif
    @endforeach
</nav>
@endif
