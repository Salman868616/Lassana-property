@extends('layouts.admin')

@section('title', 'Lassana Property | Admin Dashboard')
@section('heading', 'Admin Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Welcome, {{ auth()->user()->name }}</h2>
        </div>

        <div class="card-body">
            <p>You are signed in as an administrator.</p>
            <p class="mb-0 text-body-secondary">
                Property management, verification, and lead management
                will be added here as we build each module.
            </p>
        </div>
    </div>
@endsection