@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Barang</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan saat input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Barang --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: Laptop Acer" value="{{ old('name') }}" required>
        </div>

        {{-- Merk --}}
        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" name="merk" class="form-control" placeholder="Contoh: Acer" value="{{ old('merk') }}" required>
        </div>

        {{-- Stok --}}
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" min="0" placeholder="Contoh: 5" value="{{ old('stock') }}" required>
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label for="image" class="form-label">Foto Barang (Opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        @if ($isAdmin)
            <div class="mb-3">
                <label for="status" class="form-label">Status Barang</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="">-- Pilih Status --</option>
                    @foreach ($statusList as $status)
                        <option value="{{ $status }}">{{ strtoupper($status) }}</option>
                    @endforeach
                </select>
            </div>
        @endif


        {{-- Tombol --}}
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
