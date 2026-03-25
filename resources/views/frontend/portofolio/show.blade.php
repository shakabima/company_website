<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Nunito -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Global */
body {
    background-color: #f8f9fa;
    font-family: 'Nunito', sans-serif !important;
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
}

        /* Header */
        .header {
            padding: 30px 0;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }
        .logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
            color: #6c757d;
            font-size: 2rem;
        }
        .name {
            font-size: 2rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 5px;
        }
        .role {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        /* About Section */
        .about-section {
            padding: 60px 0;
            background-color: white;
        }
        .about-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }
        .about-content {
            display: flex;
            gap: 40px;
            align-items: center;
        }
        .about-image {
            width: 200px;
            height: 200px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 3rem;
        }
        .about-text {
            flex-grow: 1;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #495057;
        }

        /* Portfolio Section */
        .portfolio-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }
        .portfolio-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .portfolio-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .portfolio-item:hover {
            transform: translateY(-5px);
        }
        .portfolio-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-color: #f8f9fa;
        }
        .portfolio-caption {
            padding: 15px;
            background: white;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            font-size: 0.95rem;
            color: #212529;
            font-weight: 600;
        }

        /* Contact Section */
        .contact-section {
            padding: 60px 0;
            background-color: white;
            text-align: center;
        }
        .contact-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .contact-info {
            font-size: 1.1rem;
            color: #495057;
            line-height: 1.6;
        }
        .contact-email {
            color: #0d6efd;
            font-weight: 600;
            text-decoration: none;
        }
        .contact-email:hover {
            text-decoration: underline;
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 30px;
            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease, transform 0.2s ease;
            font-size: 1rem;
        }
        .back-link:hover {
            color: #0056b3;
            transform: translateX(-3px);
        }
        .back-link i {
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
                gap: 20px;
            }
            .about-image {
                width: 100%;
                max-width: 300px;
            }
            .portfolio-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header" style="padding-top: 80px; padding-bottom: 30px; text-align: center; border-bottom: 1px solid #dee2e6;">
    <div class="container">
        @if($portofolio->image)
            <img src="{{ asset('uploads/portofolio/' . $portofolio->image) }}" 
                 style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #0d6efd; margin-bottom: 15px; display: inline-flex; align-items: center; justify-content: center; background-color: #e9ecef; color: #6c757d; font-size: 2rem;"
                 alt="{{ $portofolio->title }}">
        @else
            <div style="width: 80px; height: 80px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; background-color: #e9ecef; color: #6c757d; font-size: 2rem; border: 3px solid #0d6efd; margin-bottom: 15px;">
                <i class="bi bi-briefcase"></i>
            </div>
        @endif

        <h1 class="name" style="font-size: 2rem; font-weight: 700; color: #212529; margin-bottom: 5px;">{{ $portofolio->title }}</h1>
        <p class="role" style="font-size: 1rem; color: #6c757d; margin-bottom: 20px;">Project • {{ $portofolio->category ?? 'Uncategorized' }}</p>
    </div>
</div>

<!-- About Section -->
<div class="about-section">
    <div class="container">
        <h2 class="about-title">About This Project</h2>
        <div class="about-content">
            <!-- Gambar Singkat = Gambar Portofolio -->
            @if($portofolio->image)
                <img src="{{ asset('uploads/portofolio/' . $portofolio->image) }}" 
                     class="about-image" 
                     alt="{{ $portofolio->title }}">
            @else
                <div class="about-image">
                    <i class="bi bi-briefcase"></i>
                </div>
            @endif

            <!-- Teks About = Deskripsi Portofolio -->
            <div class="about-text">
                {{ $portofolio->description }}
            </div>
        </div>
    </div>
</div>

    <!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('frontend.home') }}">Lubis Advocates and Legal Consultant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#about">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#team">Our Teams</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('frontend.news') }}">News</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.portofolio') }}">Portfolio</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Portfolio Section -->
<div class="portfolio-section">
    <div class="container">
        <h2 class="portfolio-title">Other Projects</h2>
        <div class="portfolio-grid">
            @if($portofolio->employee)
                @foreach($portofolio->employee->portofolios as $item)
                    @if($item->id != $portofolio->id) <!-- Jangan tampilkan portofolio saat ini -->
                        <div class="portfolio-item">
                            @if($item->image)
                                <img src="{{ asset('uploads/portofolio/' . $item->image) }}" 
                                     class="portfolio-img" 
                                     alt="{{ $item->title }}">
                            @else
                                <div class="portfolio-img d-flex align-items-center justify-content-center" style="color: #6c757d;">
                                    <i class="bi bi-briefcase" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <div class="portfolio-caption">
                                {{ $item->title }}
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-12 text-center py-4 text-muted">
                    Belum ada proyek lain.
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="contact-section">
    <div class="container">
        <h2 class="contact-title">Contact Me</h2>
        <div class="contact-info">
            <p>Feel free to reach out for collaborations or inquiries.</p>
            @if($portofolio->employee)
                <p><strong>Email:</strong> 
                    <a href="mailto:{{ $portofolio->employee->email }}" class="contact-email">
                        {{ $portofolio->employee->email }}
                    </a>
                </p>
                <p><strong>Phone:</strong> {{ $portofolio->employee->phone ?? '-' }}</p>
            @else
                <p><strong>Email:</strong> 
                    <a href="mailto:Lubisadvocates@gmail.com" class="contact-email">
                        Lubisadvocates@gmail.com
                    </a>
                </p>
                <p><strong>Phone:</strong> +62 21 1234 5678</p>
            @endif
        </div>
    </div>
</div>

<!-- Back Link -->
<div class="text-center mt-5 mb-4">
    <a href="{{ route('frontend.portofolio') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali ke Portofolio
    </a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>