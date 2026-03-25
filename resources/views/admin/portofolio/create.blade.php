@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tambah Portofolio</h2>
        <a href="{{ route('admin.portofolio') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Portofolio</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="client" class="form-label">Nama Karyawan</label>
                    <input type="text" name="client" id="client" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Topik</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (Opsional)</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, GIF (max 2MB)</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Portofolio</button>
                    <a href="{{ route('admin.portofolio') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection