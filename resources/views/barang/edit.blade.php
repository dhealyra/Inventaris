@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-14 bg-white p-10 rounded-2xl shadow-xl space-y-10">

    <h2 class="text-2xl font-bold text-center text-gray-800">Edit Data Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @csrf
        @method('PUT')

        {{-- Nama Barang --}}
        <div>
            <label for="name" class="block mb-2 font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="name" id="name" value="{{ old('name', $barang->name) }}"
                class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- Merk --}}
        <div>
            <label for="merk" class="block mb-2 font-medium text-gray-700">Merk</label>
            <input type="text" name="merk" id="merk" value="{{ old('merk', $barang->merk) }}"
                class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- Stok --}}
        <div>
            <label for="stock" class="block mb-2 font-medium text-gray-700">Stok</label>
            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $barang->stock) }}"
                class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- Gambar Saat Ini --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">Gambar Saat Ini</label>
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


        {{-- Tombol --}}
        <div class="md:col-span-2 flex gap-4 pt-6">
            <a href="{{ route('barang.index') }}"
                class="flex-1 text-center py-3 bg-gray-400 hover:bg-gray-600 text-white rounded-lg font-semibold transition">
                Batal
            </a>
            <button type="submit"
                class="flex-1 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
