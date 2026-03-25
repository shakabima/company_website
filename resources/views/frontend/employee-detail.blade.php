@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
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
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.news') }}">{{ __('News') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.portofolio') }}">{{ __('Portfolio') }}</a></li>
            </ul>
        </div>
    </div> 
</nav>

<div class="ms-5 mt-3">
    <a href="{{ route('frontend.employees.all') }}#team" class="btn btn-outline-primary" style="font-weight: 600; padding: 8px 16px; font-size: 0.9rem; border-radius: 8px;">← {{ __('Back to Our Teams') }}</a>
</div>

<div class="container" style="margin-top: 50px !important;">
    <!-- Card Utama -->
    <div class="card shadow-sm border-0 rounded-4" style="background: white; overflow: hidden;">
        <!-- Header: Foto & Nama -->
        <div class="bg-white p-4 text-center" style="background: linear-gradient(135deg, #f8f9fa, #ffffff);">
            @if($employee->photo)
                <div style="width: 120px; height: 0; padding-top: 100%; margin: 0 auto; border-radius: 50%; background: url('{{ asset('uploads/employees/' . $employee->photo) }}') center/contain no-repeat; border: 3px solid #0d6efd; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"></div>
            @else
                <div class="d-flex justify-content-center align-items-center bg-light rounded-circle" style="width: 120px; height: 120px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <i class="bi bi-person-fill text-secondary" style="font-size: 2rem;"></i>
                </div>
            @endif
            <h2 class="mb-1" style="font-weight: 700; color: #212529;">{{ $employee->name }}</h2>
            <p class="text-muted mb-0" style="font-size: 0.95rem;">{{ $employee->position }}</p>
        </div>

        <!-- Body: Bio & Kontak -->
        <div class="card-body p-4">
            <!-- Bio Lengkap -->
            @if($employee->bio)
                <div class="mb-4">
                    <h5><strong>{{ __('Bio Lengkap:') }}</strong></h5>
                    <p class="lead" style="color: #495057; line-height: 1.6;">{{ $employee->bio }}</p>
                </div>
            @endif

            <!-- Kontak -->
            <div>
                <h5><strong>{{ __('Kontak:') }}</strong></h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-envelope text-primary" style="font-size: 1.2rem; margin-top: 4px;"></i>
                            <div>
                                <strong style="color: #212529;">Email:</strong><br>
                                <a href="mailto:{{ $employee->email }}" class="text-decoration-none" style="color: #0d6efd; font-weight: 500;">{{ $employee->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-telephone text-success" style="font-size: 1.2rem; margin-top: 4px;"></i>
                            <div>
                                <strong style="color: #212529;">Telepon:</strong><br>
                                <a href="tel:{{ $employee->phone }}" class="text-decoration-none" style="color: #0d6efd; font-weight: 500;">{{ $employee->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection