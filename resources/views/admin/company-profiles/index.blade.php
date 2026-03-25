@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 🔙 Tombol Kembali ke Dashboard -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>

    <h1>Profil Perusahaan</h1>
    <a href="{{ route('admin.company-profiles.create') }}" class="btn btn-primary mb-3">Tambah Profil</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($profiles as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->address }}</td>
                <td>{{ $p->phone }}</td>
                <td>{{ $p->email }}</td>
                <td style="max-width: 250px; word-wrap: break-word; white-space: pre-line;">
                    {{ $p->description }}
                </td>
                <td>
                    <a href="{{ route('admin.company-profiles.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.company-profiles.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada profil perusahaan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection