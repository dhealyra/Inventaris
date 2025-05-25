@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah User Petugas</h1>

    <a href="{{ route('petugas.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar User</a>

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

    <!-- Form Tambah User -->
    <form action="{{ route('petugas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status (Jurusan)</label>
            <select name="status" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="umum" {{ old('status') == ' umum' ? 'selected' : '' }}>Petugas Umum</option>
                <option value="rpl" {{ old('status') == 'rpl' ? 'selected' : '' }}>RPL</option>
                <option value="tkr" {{ old('status') == 'tkr' ? 'selected' : '' }}>TKR</option>
                <option value="tsm" {{ old('status') == 'tsm' ? 'selected' : '' }}>TSM</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
 