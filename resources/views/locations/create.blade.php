@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Data Lokasi</h4>

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" name="jurusan" id="jurusan" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="RPL">RPL</option>
                <option value="TBSM">TBSM</option>
                <option value="TKRO">TKRO</option>
                <option value="UMUM">UMUM</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection