@extends('layouts.frontend')

@section('content')
<style>
    body {
        font-family: 'Nunito', sans-serif !important;
        scroll-behavior: smooth;
        background-color: #f8f9fa;
        color: #212529;
    }

    .section {
        padding: 60px 0;
    }

    .section.bg-light {
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    /* ❌ HAPUS SEMUA HOVER EFFECT PADA SECTION BESAR */
    /* Tidak ada hover di #about, #team, atau .section.bg-light */

    .navbar.fixed-top {
        background: rgba(255,255,255,0.95);
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .nav-link.active {
        color: #0d6efd !important;
        border-bottom: 3px solid #0d6efd;
        font-weight: 600;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 100vh;
        min-height: 600px;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                    url('{{ asset('uploads/hero/hero-bg.jpg') }}') no-repeat center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 0 20px;
    }

    .hero-section .container {
        max-width: 800px;
    }

    .hero-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        letter-spacing: -0.5px;
        line-height: 1.2;
    }

    .hero-section p {
        font-size: 1rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .hero-section .btn {
        margin: 0 10px;
        padding: 12px 24px;
        font-size: 1.1rem;
        border-radius: 30px;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .btn-primary {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
        color: white !important;
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
    }

    .btn-primary:hover {
        background-color: #0056b3 !important;
        border-color: #0056b3 !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(13, 110, 253, 0.3);
    }

    .btn-outline-light {
        border-color: #fff !important;
        color: #fff !important;
        background-color: transparent;
        font-weight: 600;
    }

    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.2) !important;
        border-color: #fff !important;
        color: #fff !important;
        transform: translateY(-2px);
    }

    /* Our Core Values */
    .core-value-item {
        padding: 20px;
        border-radius: 12px;
        background: #ffffff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .core-value-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .core-value-item .number {
        font-size: 2.5rem;
        color: #0d6efd;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .core-value-item .label {
        font-size: 1rem;
        color: #6c757d;
        font-weight: 500;
    }

    /* About Us Image - Smooth Border */
    .about-image {
        height: 300px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }
    .about-image:hover {
        transform: scale(1.02);
    }

    /* Team Section */
    #team.section {
        background-color: #d0e6ff !important;
        padding: 60px 0;
    }
    #team .team-intro-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    #team .btn-primary {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
        color: white !important;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 8px;
    }
    #team .btn-primary:hover {
        background-color: #0056b3 !important;
        border-color: #0056b3 !important;
        transform: translateY(-2px);
    }

    /* News Card */
    #news .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    #news .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    #news .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    #news .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    #news .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    #news .card-text {
        font-size: 0.95rem;
        line-height: 1.5;
        color: #495057;
        flex-grow: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    #news .btn-sm {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
    }
    #news .text-muted {
        font-size: 0.75rem;
        color: #6c757d;
    }

    /* Footer */
    footer.bg-dark {
        background-color: #212529 !important;
        padding: 20px 0;
    }
    footer .text-white {
        color: #ffffff !important;
    }
    footer .small {
        font-size: 0.85rem;
        color: #adb5bd;
    }

    /* RESPONSIVE MOBILE */
    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            min-height: 400px;
            padding: 60px 20px;
        }
        .hero-section h1 {
            font-size: 2rem;
        }
        .hero-section p {
            font-size: 0.95rem;
        }
        .hero-section .btn {
            margin: 10px 0;
            width: 100%;
            max-width: 200px;
        }
    }

    @media (max-width: 576px) {
        .hero-section h1 {
            font-size: 1.8rem;
        }
        .hero-section p {
            font-size: 0.9rem;
        }
    }
</style>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('frontend.home') }}">Lubis Advocates and Legal Consultant</a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Utama + Dropdown Bahasa -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('frontend.home') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="#about">{{ __('About Us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="#team">{{ __('Our Teams') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="#contact">{{ __('Contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('frontend.news') }}">{{ __('News') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('frontend.portofolio') }}">{{ __('Portfolio') }}</a>
                </li>
            </ul>

            <!-- Dropdown Bahasa (Mini) -->
            <ul class="navbar-nav ms-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-1 px-2" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.85rem; font-weight: 600;">
                        @if(session('locale') == 'id')
                            ID
                        @else
                            EN
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('lang.switch', 'id') }}">🇮🇩 ID</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('lang.switch', 'en') }}">🇬🇧 EN</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>{{ __('Lubis Advocates and Legal Consultant') }}</h1>
        <p>{{ __('Join a trusted network of logistics professionals spanning 90+ countries, built to help you grow, reduce risk, and thrive in a secure environment.') }}</p>
        <a href="#contact" class="btn btn-primary">{{ __('Become a Member') }}</a>
        <a href="#video" class="btn btn-outline-light">{{ __('Watch Video') }}</a>
    </div>
</section>

<!-- Our Core Values -->
<section class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">{{ __('Our Core Values') }}</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="core-value-item">
                    <div class="number">210+</div>
                    <div class="label">{{ __('Locations') }}</div>
                    <small class="text-muted">{{ __('Across 90+ countries') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="core-value-item">
                    <div class="number">450+</div>
                    <div class="label">{{ __('Members') }}</div>
                    <small class="text-muted">{{ __('Trusted network of professionals') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="core-value-item">
                    <div class="number">90+</div>
                    <div class="label">{{ __('Countries') }}</div>
                    <small class="text-muted">{{ __('Global reach & presence') }}</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section id="about" class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">{{ __('About Us') }}</h2>
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                @if($companyProfile)
                    <h3 class="mb-4">{{ $companyProfile->name }}</h3>
                    <p><strong>{{ __('Address:') }}</strong> {{ $companyProfile->address }}</p>
                    <p><strong>{{ __('Phone:') }}</strong> {{ $companyProfile->phone }}</p>
                    <p><strong>{{ __('Email:') }}</strong> {{ $companyProfile->email }}</p>
                    <p class="lead mt-3">{{ $companyProfile->description }}</p>
                    <a href="#contact" class="btn btn-primary mt-3" style="font-weight: 600; padding: 10px 24px;">{{ __('Contact Us →') }}</a>
                @else
                    <p class="text-muted">{{ __('No company profile available.') }}</p>
                @endif
            </div>
            <div class="col-md-6">
                <img src="{{ asset('uploads/hero/about.jpg') }}" 
                     alt="{{ __('About Us') }}" 
                     class="about-image">
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section id="team" class="section">
    <div class="container">
        <h2 class="text-center mb-5">{{ __('Our Teams') }}</h2>
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h3>{{ __('Meet Our Dedicated Team') }}</h3>
                <p class="lead">{{ __('Our team of logistics experts is committed to delivering excellence, building trust, and growing with you across borders.') }}</p>
                <p>{{ __('We believe in collaboration, integrity, and innovation — values that guide every decision we make.') }}</p>
                <a href="{{ route('frontend.employees.all') }}" class="btn btn-primary mt-3">{{ __('See All Our Teams →') }}</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('uploads/hero/team-placeholder.jpg') }}" 
                     alt="{{ __('Our Team') }}" 
                     class="team-intro-image w-100">
            </div>
        </div>
    </div>
</section>

<!-- News -->
<section id="news" class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-3">{{ __('News') }}</h2>
        <p class="text-center mb-4" style="font-size: 1.1rem; font-weight: 500; color: #495057; line-height: 1.6;">
            {{ __('Here are the three latest news from our company.') }}
        </p>
        <div class="row">
            @foreach($news->take(3) as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($item->image)
                        <img src="{{ asset('uploads/news/' . $item->image) }}" 
                             class="card-img-top" 
                             style="height: 200px; object-fit: contain; background-color: #f8f9fa;"
                             alt="{{ $item->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ Str::limit($item->content, 80, '...') }}</p>
                        <a href="{{ route('frontend.news.detail', $item->id) }}" class="btn btn-sm btn-primary">
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
        <div class="text-center mt-3">
            <a href="{{ route('frontend.news') }}" 
               class="btn btn-outline-primary"
               style="font-weight: 600; padding: 10px 24px; font-size: 1rem;">
                {{ __('View All News') }}
            </a>
        </div>
    </div>
</section>

<!-- Smooth Scroll & Active Navbar on Scroll -->
<script>
    // Fungsi untuk mengecek section mana yang terlihat
    function updateActiveNav() {
        const sections = document.querySelectorAll('section[id], [id="about"], [id="contact"], [id="team"], [id="news"]');
        const navLinks = document.querySelectorAll('.nav-link');

        let currentSection = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100; // Kurangi tinggi navbar
            if (pageYOffset >= sectionTop) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + currentSection) {
                link.classList.add('active');
            }
        });
    }

    // Jalankan saat scroll
    window.addEventListener('scroll', updateActiveNav);

    // Jalankan saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', updateActiveNav);
</script>


@endsection 



