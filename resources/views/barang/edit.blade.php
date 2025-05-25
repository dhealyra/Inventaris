@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Data Barang</h1>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $barang->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" name="merk" id="merk" class="form-control" value="{{ old('merk', $barang->merk) }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control" min="0" value="{{ old('stock', $barang->stock) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Sekarang</label><br>
            @if ($barang->image)
                <img src="{{ asset('storage/' . $barang->image) }}" width="120" class="mb-2">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar Baru (opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Barang</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
