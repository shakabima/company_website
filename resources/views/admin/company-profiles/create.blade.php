@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 🔙 Tombol Kembali ke Daftar Profil -->
    <div class="mb-3">
        <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-outline-secondary">
            ← Kembali ke Daftar Profil
        </a>
    </div>

    <h1>Tambah Profil Perusahaan</h1>

    <form action="{{ route('admin.company-profiles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Profil</button>
        <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection