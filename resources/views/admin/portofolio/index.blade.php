@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 🔙 Tombol Kembali ke Dashboard -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>

    <h2>Portofolio</h2>
    <a href="{{ route('admin.portofolio.create') }}" class="btn btn-primary mb-3">Tambah Portofolio</a>

    <p class="mb-4">Portofolio terbaik kami yang mencerminkan kualitas dan dedikasi.</p>

    @if($portofolios->count() == 0)
        <div class="alert alert-info">Belum ada data portofolio.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Klien</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portofolios as $item)
                    <tr>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('uploads/portofolio/' . $item->image) }}" 
                                     style="height: 50px; width: 50px; object-fit: cover; border-radius: 4px;"
                                     alt="{{ $item->title }}">
                            @else
                                <i class="bi bi-briefcase text-secondary" style="font-size: 1.5rem;"></i>
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ Str::limit($item->description, 30, '...') }}</td>
                        <td>{{ $item->client ?? '-' }}</td>
                        <td>{{ $item->category ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.portofolio.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $portofolios->links() }}
        </div>
    @endif
</div>
@endsection