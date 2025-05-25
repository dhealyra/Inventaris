@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Data User</h1>

    <a href="{{ route('petugas.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar User</a>

    <!-- Tampilkan Error Validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan saat input data:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $petugas->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $petugas->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status (Jurusan)</label>
            <select name="status" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="petugas umum" {{ old('status', $petugas->status) == 'petugas umum' ? 'selected' : '' }}>Petugas Umum</option>
                <option value="rpl" {{ old('status', $petugas->status) == 'rpl' ? 'selected' : '' }}>RPL</option>
                <option value="tkr" {{ old('status', $petugas->status) == 'tkr' ? 'selected' : '' }}>TKR</option>
                <option value="tsm" {{ old('status', $petugas->status) == 'tsm' ? 'selected' : '' }}>TSM</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
