<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Nunito -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif !important;
            scroll-behavior: smooth; /* ✅ Smooth scroll untuk semua anchor */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
            padding-top: 70px; /* Sesuaikan dengan navbar */
        }

        footer.bg-dark {
            margin-top: auto;
        }

        footer {
            font-size: 0.881rem;   /* default Bootstrap small */
        }

        footer small {
            line-height: 1.6
        }

        footer i {
            font-size: 0.9rem;
        }

        .navbar-brand {
            font-weight: 700;
            color: #212529 !important;
        }
        .nav-link {
            font-weight: 500;
        }

        /* Smooth scroll untuk anchor yang tidak terdeteksi oleh browser */
        [data-scroll] {
            scroll-margin-top: 70px; /* Agar tidak tertutup navbar */
        }
    </style>
</head>
<body>

    <!-- Navbar Frontend -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarFrontend" 
                    aria-controls="navbarFrontend" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarFrontend">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">{{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">{{ __('Contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#teams">{{ __('Our Teams') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news">{{ __('News') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">{{ __('Portfolio') }}</a>
                    </li>
                </ul>

                <!-- Language Dropdown -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            @if(session('locale') == 'id')
                                🇮🇩 Bahasa Indonesia
                            @else
                                🇬🇧 English
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', 'id') }}">
                                    🇮🇩 Bahasa Indonesia
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                                    🇬🇧 English
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="content">
        @yield('content')
    </div>

    
 <!-- Footer -->
<footer id="contact" class="bg-dark text-white py-3 mt-auto" data-scroll>
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

    <!-- Bootstrap JS (WAJIB untuk toggle & dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- Smooth Scroll Script (opsional, jika scroll-behavior tidak cukup) -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 70, // Kurangi tinggi navbar
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>