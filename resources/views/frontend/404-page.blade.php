@extends('layouts.frontend-app')

@section('title', 'Page Not Found')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-1 text-danger">404</h1>
    <h2 class="mb-4">Oops! Page not found.</h2>
    <p class="text-muted mb-4">
        The page you're looking for doesn't exist or has been moved.
    </p>
    <a href="{{ url('/') }}" class="btn btn-primary">
        <i class="fa fa-home"></i> Go to Homepage
    </a>
</div>
@endsection
