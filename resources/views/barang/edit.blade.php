@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-14 bg-white p-10 rounded-2xl shadow-xl space-y-10">

    <h2 class="text-2xl font-bold text-center text-gray-800">Edit Data Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        @method('PUT')

        {{-- Nama Barang --}}
        <div class="flex flex-col gap-2">
            <label for="name" class="text-gray-700 font-medium">Nama Barang</label>
            <input type="text" name="name" id="name"
                value="{{ old('name', $barang->name) }}"
                class="rounded-xl border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none px-4 py-2 text-gray-800 text-base"
                required>
        </div>

        {{-- Merk --}}
        <div class="flex flex-col gap-2">
            <label for="merk" class="text-gray-700 font-medium">Merk</label>
            <input type="text" name="merk" id="merk"
                value="{{ old('merk', $barang->merk) }}"
                class="rounded-xl border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none px-4 py-2 text-gray-800 text-base"
                required>
        </div>

        {{-- Stok --}}
        <div class="flex flex-col gap-2">
            <label for="stock" class="text-gray-700 font-medium">Stok</label>
            <input type="number" name="stock" id="stock" min="0"
                value="{{ old('stock', $barang->stock) }}"
                class="rounded-xl border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none px-4 py-2 text-gray-800 text-base"
                required>
        </div>

        {{-- Gambar Sekarang --}}
        <div class="flex flex-col gap-2">
            <label class="text-gray-700 font-medium">Gambar Sekarang</label>
            @if ($barang->image)
                <img src="{{ asset('storage/' . $barang->image) }}" class="w-32 h-auto rounded-lg shadow">
            @else
                <p class="text-sm text-gray-500 italic">Tidak ada gambar</p>
            @endif
        </div>

        {{-- Upload Gambar Baru --}}
        <div class="flex flex-col gap-2">
            <label for="image" class="text-gray-700 font-medium">Upload Gambar Baru (opsional)</label>
            <input type="file" name="image" id="image"
                class="rounded-xl border-gray-300 px-4 py-2 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        {{-- Tombol Aksi --}}
        <div class="md:col-span-2 flex justify-between gap-4 pt-4">
            <a href="{{ route('barang.index') }}"
                class="w-full text-center py-3 bg-gray-300 hover:bg-gray-500 text-white rounded-xl font-semibold transition duration-200">
                Kembali
            </a>
            <button type="submit"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition duration-200">
                Update Barang
            </button>
        </div>
    </form>
</div>
@endsection
