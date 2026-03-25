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
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif !important;
            scroll-behavior: smooth;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .content {
            flex: 1;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        footer {
            background-color: #212529;
            color: white;
            padding: 20px 0;
            width: 100%;
            margin-top: auto;
        }

        /* ✅ KODE CSS ANDA */
        .portfolio-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
        }
        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .portfolio-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-color: #f8f9fa;
        }
        .portfolio-body {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .portfolio-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #212529;
            line-height: 1.4;
        }
        .portfolio-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #495057;
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .portfolio-meta {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.5rem;
            line-height: 1.4;
        }
        .portfolio-meta span {
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- Konten Utama -->
    <div class="content">
        <div class="container mt-5">
            <h2 class="text-center mb-5">Our Portfolio</h2>
            <p class="text-center mb-4">Projects that define our excellence.</p>

            @if($portofolios->isEmpty())
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada portofolio.</p>
                </div>
            @else
                <div class="row">
                    @foreach($portofolios as $item)
                    <div class="col-md-4 mb-4">
                        <div class="portfolio-card">
                            @if($item->image)
    <img src="{{ asset('uploads/portofolio/' . $item->image) }}" 
         class="portfolio-img" 
         alt="{{ $item->title }}"
         style="height: 200px; object-fit: contain; background-color: #f8f9fa;">
@else
    <div class="portfolio-img d-flex align-items-center justify-content-center">
        <i class="bi bi-briefcase text-secondary" style="font-size: 3rem;"></i>
    </div>
@endif
                            <div class="portfolio-body">
                                <h5 class="portfolio-title">{{ $item->title }}</h5>
                                <p class="portfolio-text">{{ $item->description }}</p>
                                @if($item->client || $item->category)
                                    <div class="portfolio-meta">
                                        @if($item->client)
                                            <span>Klien:</span> {{ $item->client }}<br>
                                        @endif
                                        @if($item->category)
                                            <span>Kategori:</span> {{ $item->category }}
                                        @endif
                                    </div>
                                @endif
                                <!-- ✅ TOMBOL "VIEW DETAILS" -->
                                <a href="{{ route('frontend.portofolio.show', $item->id) }}" class="btn btn-primary mt-3 w-100">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    @if($companyProfile ?? null)
                        <small><i class="bi bi-telephone me-1"></i> {{ $companyProfile->phone }}</small><br>
                        <small><i class="bi bi-envelope me-1"></i> {{ $companyProfile->email }}</small><br>
                        <small><i class="bi bi-geo-alt me-1"></i> {{ $companyProfile->address }}</small>
                    @else
                        <small><i class="bi bi-telephone me-1"></i> +62 21 1234 5678</small><br>
                        <small><i class="bi bi-envelope me-1"></i> Lubisadvocates@gmail.com</small><br>
                        <small><i class="bi bi-geo-alt me-1"></i> Menara Palma Lantai 22 Unit 22-06, Jl. H.R. Rasuna Said Kavling VI No. 9 Blok X2, RT.9/RW 4, Kelurahan Kuningan Timur, Kecamatan Setia Budi, Kota Jakarta Selatan, DKI Jakarta.</small>
                    @endif
                </div>
                <div class="col-md-6 text-md-end">
                    <small>&copy; 2025 Lubis Advocates and Legal Consultant.</small>
                </div>
            </div>
        </div>
    </footer>

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


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>