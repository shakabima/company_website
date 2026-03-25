@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 🔙 Tombol Kembali ke Dashboard -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>

    <h1>Our Teams</h1>
    <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th> <!-- ✅ Tambahkan ini -->
                <th>Bio</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $e)
            <tr>
                <td>
                    @if($e->photo)
                        <img src="{{ asset('uploads/employees/' . $e->photo) }}" 
                             alt="Foto {{ $e->name }}" 
                             style="width: 50px; height: auto; border: 1px solid #ddd; border-radius: 3px;">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $e->name }}</td>
                <td>{{ $e->position }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->phone }}</td> <!-- ✅ Tampilkan telepon -->
                <td style="max-width: 250px; word-wrap: break-word; white-space: pre-line;">
                    {{ $e->bio }}
                </td>
                <td>
                    <a href="{{ route('admin.employees.edit', $e->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.employees.destroy', $e->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Belum ada karyawan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection