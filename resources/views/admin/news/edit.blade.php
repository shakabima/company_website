@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Berita</h1>

    <!-- Tambahkan enctype="multipart/form-data" agar bisa upload file -->
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $news->content }}</textarea>
        </div>

        <!-- Input Upload Gambar Baru -->
        <div class="mb-3">
            <label for="image" class="form-label">Ganti Gambar Berita (Opsional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">

            <!-- Preview Gambar Lama -->
            @if($news->image)
                <div class="mt-3">
                    <strong>Gambar Saat Ini:</strong><br>
                    <img src="{{ asset('uploads/news/' . $news->image) }}" alt="Gambar Berita" style="max-width: 200px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            @endif

            <small class="form-text text-muted">
                Format: JPG, PNG, GIF | Maksimal 2MB
            </small>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Publikasi</label>
            <input type="date" class="form-control" id="published_at" name="published_at" value="{{ $news->published_at }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Berita</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection