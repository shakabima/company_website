<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif !important;
        }
        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        footer.bg-dark {
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- ✅ Hanya padding atas, tidak ada padding bawah -->
        <main class="pt-4">
            @yield('content')
        </main>

        <!-- ✅ FOOTER STICKY -->
        <footer class="bg-dark text-white py-3">
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
                            <small><i class="bi bi-geo-alt me-1"></i> Menara Palma Lantai 22 Unit 22-06, Jl. H.R. Rasuna Said Kavling VI No. 9 Blok X2, RT.9/RW 4, Kelurahan Kuningan Timur, Kecamatan Setia Budi, Kota Jakarta Selatan, DKI Jakarta</small>
                        @endif
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small>&copy; 2025 Lubis Advocates and Legal Consultant.</small>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>