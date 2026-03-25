@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.portofolio') }}" class="btn btn-outline-secondary">← Kembali</a>
        <h2>Edit Portofolio</h2>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Portofolio</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $portofolio->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required>{{ $portofolio->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="client" class="form-label">Nama Klien</label>
                    <input type="text" name="client" id="client" class="form-control" value="{{ $portofolio->client }}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ $portofolio->category }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (Opsional)</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    @if($portofolio->image)
                        <div class="mt-2">
                            <img src="{{ asset('uploads/portofolio/' . $portofolio->image) }}" 
                                 alt="Current Image" 
                                 style="height: 100px; object-fit: cover; border-radius: 8px;">
                        </div>
                    @endif
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Perbarui Portofolio</button>
                    <a href="{{ route('admin.portofolio') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection