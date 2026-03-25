@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 🔙 Tombol Kembali ke Dashboard -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>

    <h1>Berita</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Isi Berita</th>
                <th>Tanggal Publikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
            <tr>
                <td>
                    @if($item->image)
                        <img src="{{ asset('uploads/news/' . $item->image) }}" 
                             alt="Gambar Berita" 
                             style="width: 50px; height: auto; border: 1px solid #ddd; border-radius: 3px;">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $item->title }}</td>
                <td style="max-width: 250px; word-wrap: break-word; white-space: pre-line;">
                    {{ $item->content }}
                </td>
                <td>{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus berita ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection