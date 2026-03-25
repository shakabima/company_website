@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Berita Baru</h1>

    {{-- ✅ Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ✅ Tampilkan notif sukses/error dari session --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Berita (Opsional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <small class="form-text text-muted">
                Format: JPG, PNG, GIF | Maksimal 2MB
            </small>
        </div>

        <div class "mb-3">
            <label for="published_at" class="form-label">Tanggal Publikasi</label>
            <input type="date" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Berita</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection