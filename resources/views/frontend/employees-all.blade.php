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

    .nav-link.active {
        color: #0d6efd !important;
        border-bottom: 3px solid #0d6efd;
        font-weight: 600;
    }

    /* Employee Card */
    .employee-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .employee-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .employee-card .card-img-top {
        height: 200px;
        object-fit: contain;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    .employee-card .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .employee-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .employee-card .card-subtitle {
        font-size: 0.95rem;
        color: #0d6efd;
        font-weight: 500;
        margin-bottom: 1rem;
    }
    .employee-card .card-text {
        font-size: 0.95rem;
        color: #495057;
        flex-grow: 1;
        line-height: 1.5;
    }
    .employee-card .btn-selengkapnya {
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
    .employee-card .text-muted {
        font-size: 0.75rem;
        color: #6c757d;
    }

    /* Back Button */
    .back-btn {
        position: fixed !important;
        top: 70px !important;
        left: 20px !important;
        z-index: 9999 !important;
    }
    .back-btn a {
        font-weight: 600;
        padding: 8px 16px;
        font-size: 0.9rem;
        border-radius: 8px;
        color: #6c757d;
        border-color: #6c757d;
        background-color: transparent;
        transition: all 0.3s ease;
    }
    .back-btn a:hover {
        background-color: #fff;
        color: #6c757d;
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

    /* Responsif */
    @media (max-width: 768px) {
        .employee-card {
            margin-bottom: 20px;
        }
    }
</style>

<div class="ms-5 mt-3">
    <a href="{{ route('frontend.home') }}" class="btn btn-outline-primary" style="font-weight: 600; padding: 8px 16px; font-size: 0.9rem; border-radius: 8px;">
        ← Back to Home
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
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}#team">Our Teams</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.news') }}">News</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.portofolio') }}">Portfolio</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Semua Karyawan Section -->
<section class="section">
    <div class="container min-vh-100">
        <h1 class="text-center mb-4">All Our Teams</h1>

        @if($employees->count() > 0)
            <div class="row">
                @foreach($employees as $employee)
                <div class="col-md-4 mb-4">
                    <div class="card employee-card">
                        @if($employee->photo)
                            <img src="{{ asset('uploads/employees/' . $employee->photo) }}" 
                                 class="card-img-top" 
                                 alt="{{ $employee->name }}">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="background-color: #f8f9fa; color: #6c757d;">
                                <i class="bi bi-person-fill" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $employee->name }}</h5>
                            <p class="card-subtitle">{{ $employee->position }}</p>
                            <p class="card-text">{{ Str::limit($employee->description, 100, '...') }}</p>
                            <a href="{{ route('frontend.employees.detail', $employee->id) }}" class="btn btn-sm btn-primary btn-selengkapnya">
                                Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="no-results text-center py-5">
                <i class="bi bi-people"></i>
                <p class="mb-0">Belum ada karyawan.</p>
            </div>
        @endif
    </div>
</section>

@endsection