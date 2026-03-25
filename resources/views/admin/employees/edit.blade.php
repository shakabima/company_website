@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Ganti Foto Karyawan (Opsional)</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            @if($employee->photo)
                <div class="mt-3">
                    <strong>Foto Saat Ini:</strong><br>
                    <img src="{{ asset('uploads/employees/' . $employee->photo) }}" alt="Foto Karyawan" style="max-width: 150px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            @endif
            <small class="form-text text-muted">Format: JPG, PNG, GIF | Maksimal 2MB</small>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio (Opsional)</label>
            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $employee->bio }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Karyawan</button>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection