@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <a href="{{ route('frontend.news') }}" class="btn btn-outline-primary" style="font-weight: 600; padding: 8px 16px; font-size: 0.9rem; border-radius: 8px;">← {{ __('Back to All News') }}</a>

    <div class="card border-0 shadow-sm">
        @if($news->image)
            <img src="{{ asset('uploads/news/' . $news->image) }}" 
                 class="card-img-top" 
                 alt="{{ $news->title }}"
                 style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain; object-position: center;">
        @endif
        <div class="card-body">
            <h1 class="card-title">{{ $news->title }}</h1>
            <p class="text-muted mb-3">
                {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}
            </p>
            <div class="card-text">
                {!! nl2br(e($news->content)) !!}
            </div>
        </div>
    </div>
</div>


<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('frontend.home') }}">Lubis Advocates and Legal Consultant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#about">{{ __('Home') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#about">{{ __('About Us') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#contact">{{ __('Contact') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#team">{{ __('Our Teams') }}</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('frontend.news') }}">{{ __('News') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.portofolio') }}">{{ __('Portfolio') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
@endsection