@extends('layouts.app')
@section('title','Agent application | Lassana Property')
@section('content')
<main class="container py-5" style="max-width:760px">
    <a href="{{ route('account-profile') }}">Back to my profile</a>
    <h1 class="h3 mt-4">Agent application</h1>
    @if(session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger" role="alert">@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>@endif
    @if(!$user->hasRole('agent') && !$user->agentApplications()->where('status','pending')->exists())
    <form method="POST" action="{{ route('account.agent-application.store') }}" class="border rounded p-4 my-4">
        @csrf
        @include('account.auth.agent-fields',['fieldPrefix'=>'application','profileDefaults'=>$user])
        <button class="btn btn-primary" style="background:#8b1e24;border-color:#8b1e24" type="submit">Submit application</button>
    </form>
    @elseif($user->hasRole('agent'))
        <p>Your agent access is active. <a href="{{ route('dashboard.role','agent') }}">Open agent dashboard</a></p>
    @else <p>Your application is awaiting admin review.</p> @endif
    @foreach($applications as $application)
    <section class="border rounded p-4 my-3">
        <h2 class="h5">{{ ucfirst($application->status) }}</h2>
        <p class="small">Submitted {{ $application->created_at->timezone('Asia/Colombo')->format('d M Y h:i A') }}</p>
        @if($application->review_notes)<p style="white-space:pre-line">{{ $application->review_notes }}</p>@endif
    </section>
    @endforeach
    {{ $applications->links('pagination::bootstrap-5') }}
</main>
@endsection
