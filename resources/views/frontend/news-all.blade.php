@extends('layouts.frontend')

@section('content')
<style>
    body {
        font-family: 'Nunito', sans-serif !important;
        background-color: #f8f9fa;
        color: #212529;
    }

    .section {
        padding: 60px 0;
    }

    .navbar.fixed-top {
        background: rgba(255,255,255,0.95);
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .news-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .news-card .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    .news-card .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .news-card .card-title {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .news-card .card-text {
        font-size: 0.95rem;
        color: #495057;
        flex-grow: 1;
        line-height: 1.5;
    }
    .news-card .btn-read-more {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
        color: white !important;
        padding: 6px 12px;
        font-weight: 600;
        border-radius: 6px;
        font-size: 0.85rem;
        width: 100%;
        margin-top: 12px;
    }
    .news-card .text-muted {
        font-size: 0.75rem;
        color: #6c757d;
    }

    /* Search Box */
    .search-box {
        margin-bottom: 30px;
        position: relative;
    }
    .search-box input {
        width: 100%;
        padding: 12px 20px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
        transition: border 0.3s;
    }
    .search-box input:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
    }

    /* No Results Message */
    .no-results {
        text-align: center;
        padding: 40px 20px;
        font-size: 1.1rem;
        color: #6c757d;
        display: none;
    }
    .no-results i {
        font-size: 2rem;
        color: #6c757d;
        margin-bottom: 10px;
    }
</style>

<div class="ms-5 mt-3">
    <a href="{{ route('frontend.home') }}" class="btn btn-outline-primary" style="font-weight: 600; padding: 8px 16px; font-size: 0.9rem; border-radius: 8px;">
        ← {{ __('Back to Home') }}
    </a>
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

<!-- All News Section -->
<section class="section">
    <div class="container min-vh-100">
        <h1 class="text-center mb-4">{{ __('All News') }}</h1>
        <p class="text-center text-muted mb-5">{{ __('Explore all our latest updates and announcements.') }}</p>

        <!-- Search Box -->
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="{{ __('Search news by title or content...') }}" onkeyup="filterNews()">
        </div>

        @if($news->count() > 0)
            <div class="row" id="newsContainer">
                @foreach($news as $item)
                <div class="col-md-4 mb-4 news-item" 
                     data-title="{{ strtolower($item->title) }}" 
                     data-content="{{ strtolower($item->content) }}">
                    <div class="card news-card">
                        @if($item->image)
    <img src="{{ asset('uploads/news/' . $item->image) }}" 
         class="card-img-top" 
         style="height: 200px; object-fit: contain; background-color: #f8f9fa;"
         alt="{{ $item->title }}">
@endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit($item->content, 100, '...') }}</p>
                            <a href="{{ route('frontend.news.detail', $item->id) }}" class="btn btn-sm btn-primary btn-read-more">
                                {{ __('Read More') }}
                            </a>
                            <small class="text-muted mt-2 d-block">
                                {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pesan "No Results Found" -->
            <div id="noResults" class="no-results text-center py-5">
                <i class="bi bi-search"></i>
                <p class="mb-0">{{ __('No results found for your search.') }}</p>
            </div>
        @else
            <p class="text-center text-muted">{{ __('No news available.') }}</p>
        @endif
    </div>
</section>

<!-- JavaScript untuk filter real-time -->
<script>
function filterNews() {
    const input = document.getElementById('searchInput').value.toLowerCase().trim();
    const cards = document.querySelectorAll('.news-item');
    let visibleCount = 0;

    cards.forEach(card => {
        const title = card.getAttribute('data-title');
        const content = card.getAttribute('data-content');

        if (input === '') {
            card.style.display = 'block';
            visibleCount++;
        } else if (title.includes(input) || content.includes(input)) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const noResultsDiv = document.getElementById('noResults');
    if (input !== '' && visibleCount === 0) {
        noResultsDiv.style.display = 'block';
    } else {
        noResultsDiv.style.display = 'none';
    }
}
</script>

@endsection