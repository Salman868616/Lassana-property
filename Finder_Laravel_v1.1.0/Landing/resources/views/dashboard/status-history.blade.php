@if($statusHistory !== null)
<section class="card p-4 mt-4" id="status-history">
    <h2 class="h5">Status history</h2>
    <p class="text-secondary small">Latest first · Sri Lanka time</p>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th scope="col">When</th><th scope="col">Change</th><th scope="col">Changed by</th><th scope="col">Notes</th></tr></thead>
            <tbody>
            @forelse($statusHistory as $entry)
                <tr>
                    <td class="text-nowrap">{{ $entry->created_at->timezone('Asia/Colombo')->format('d M Y h:i:s A') }}</td>
                    <td>
                        @if($entry->from_status)
                            <span class="lp-status {{ $entry->from_status }}">{{ ucfirst(str_replace('_', ' ', $entry->from_status)) }}</span> &rarr;
                        @else
                            {{ $entry->event === 'baseline' ? 'Tracking started:' : 'Created:' }}
                        @endif
                        <span class="lp-status {{ $entry->to_status }}">{{ ucfirst(str_replace('_', ' ', $entry->to_status)) }}</span>
                    </td>
                    <td>{{ $entry->actor_name ?? 'Not recorded' }}</td>
                    <td style="white-space:pre-wrap">{{ $entry->remarks ?? '—' }}</td>
                </tr>
            @empty
                <tr><td colspan="4">No status changes have been recorded.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $statusHistory->fragment('status-history')->links() }}</div>
</section>
@endif
