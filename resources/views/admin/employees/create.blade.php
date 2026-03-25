@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Karyawan Baru</h1>

    <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto Karyawan (Opsional)</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            <small class="form-text text-muted">Format: JPG, PNG, GIF | Maksimal 2MB</small>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio (Opsional)</label>
            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Karyawan</button>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection