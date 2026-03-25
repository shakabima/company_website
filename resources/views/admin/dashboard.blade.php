@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Dashboard Admin</h1>
    <p class="text-muted">Selamat datang kembali! Kelola informasi sistem Anda disini.</p>

    <div class="row mt-4">
        <!-- Profil Perusahaan -->
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white shadow-sm" style="border-radius: 12px; overflow: hidden; transition: transform 0.3s ease; box-shadow: 0 6px 15px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.2);">
                <div class="card-body p-4 d-flex flex-column align-items-center justify-content-between" style="height: 200px;">
                    <div class="d-flex flex-column align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-building mb-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 1h1v14h15V1H0zm1 0h14v13H1V1zm2 2v10h1V3H3zm2 0v10h5V3H5zm6 0v10h1V3h-1z"/>
                        </svg>
                        <span class="text-center fw-bold fs-5">Profil Perusahaan</span>
                    </div>
                    <a href="{{ route('admin.company-profiles.index') }}" class="text-white d-inline-flex align-items-center" style="text-decoration: none; font-size: 0.95rem; gap: 6px; font-weight: 600; letter-spacing: 0.5px;">
                        Kelola
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Karyawan ✅ DIPERBAIKI -->
        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white shadow-sm" style="border-radius: 12px; overflow: hidden; transition: transform 0.3s ease; box-shadow: 0 6px 15px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.2);">
                <div class="card-body p-4 d-flex flex-column align-items-center justify-content-between" style="height: 200px;">
                    <div class="d-flex flex-column align-items-center">
                        <!-- ✅ GANTI KE bi-person-fill (LEBIH TEBAL & SERASI) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-fill mb-3" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        <span class="text-center fw-bold fs-5">Karyawan</span>
                    </div>
                    <a href="{{ route('admin.employees.index') }}" class="text-white d-inline-flex align-items-center" style="text-decoration: none; font-size: 0.95rem; gap: 6px; font-weight: 600; letter-spacing: 0.5px;">
                        Kelola
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Berita -->
        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white shadow-sm" style="border-radius: 12px; overflow: hidden; transition: transform 0.3s ease; box-shadow: 0 6px 15px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.2);">
                <div class="card-body p-4 d-flex flex-column align-items-center justify-content-between" style="height: 200px;">
                    <div class="d-flex flex-column align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-newspaper mb-3" viewBox="0 0 16 16">
                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 0 13V2.5zm7.5 0V10h2V2.5zm0 12v-2h2v2z"/>
                        </svg>
                        <span class="text-center fw-bold fs-5">Berita</span>
                    </div>
                    <a href="{{ route('admin.news.index') }}" class="text-white d-inline-flex align-items-center" style="text-decoration: none; font-size: 0.95rem; gap: 6px; font-weight: 600; letter-spacing: 0.5px;">
                        Kelola
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Portofolio -->
        <div class="col-md-3 mb-3">
            <div class="card bg-secondary text-white shadow-sm" style="border-radius: 12px; overflow: hidden; transition: transform 0.3s ease; box-shadow: 0 6px 15px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.2);">
                <div class="card-body p-4 d-flex flex-column align-items-center justify-content-between" style="height: 200px;">
                    <div class="d-flex flex-column align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-briefcase mb-3" viewBox="0 0 16 16">
                            <path d="M0 8V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9H1zm14-4v2H1V4h14z"/>
                        </svg>
                        <span class="text-center fw-bold fs-5">Portofolio</span>
                    </div>
                    <a href="{{ route('admin.portofolio') }}" class="text-white d-inline-flex align-items-center" style="text-decoration: none; font-size: 0.95rem; gap: 6px; font-weight: 600; letter-spacing: 0.5px;">
                        Kelola
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection