@extends('layouts.dashboard')
@section('content')
<a class="btn btn-lp mb-4" href="{{ route('admin.testimonials.create') }}">Add testimonial</a>
<p>Use genuine customer feedback with permission to display the quote and name. Drafts stay off the homepage.</p>
<div class="card p-4"><div class="table-responsive"><table class="table"><thead><tr><th>Customer</th><th>Context</th><th>Visibility</th><th>Action</th></tr></thead><tbody>
@forelse($testimonials as $testimonial)<tr><td>{{ $testimonial->customer_name }}</td><td>{{ $testimonial->context }}</td><td>{{ $testimonial->is_published && $testimonial->consent_confirmed ? 'Published' : 'Draft' }}</td><td><a href="{{ route('admin.testimonials.edit',$testimonial) }}">Edit testimonial</a></td></tr>@empty<tr><td colspan="4">No approved customer quotes have been added. The homepage testimonial section stays hidden.</td></tr>@endforelse
</tbody></table></div>{{ $testimonials->links() }}</div>
@endsection
