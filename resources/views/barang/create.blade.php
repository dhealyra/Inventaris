@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white p-10 rounded-xl shadow-lg">

    <h5 class="text-2xl font-bold mb-8 text-center text-gray-700">Tambah Barang</h5>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-5 rounded-md mb-8 border border-red-400">
            <strong class="block mb-2 text-lg">Oops!</strong> Ada kesalahan saat input:
            <ul class="list-disc pl-6 mt-2 space-y-1 text-base">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @csrf

        {{-- Nama Barang --}}
        <div>
            <label for="name" class="block font-semibold text-gray-700 mb-2">Nama Barang</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Laptop Acer" required>
        </div>

        {{-- Merk --}}
        <div>
            <label for="merk" class="block font-semibold text-gray-700 mb-2">Merk</label>
            <input type="text" name="merk" id="merk" value="{{ old('merk') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Acer" required>
        </div>

        {{-- Stok --}}
        <div>
            <label for="stock" class="block font-semibold text-gray-700 mb-2">Stok</label>
            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: 5" required>
        </div>

        {{-- Foto Barang + Preview --}}
        <div class="md:col-span-2">
            <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">Foto Barang (Opsional)</label>
            <label for="image"
                class="flex flex-col items-center justify-center gap-2 px-6 py-6 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-blue-50 transition duration-200">
                <span class="text-sm text-gray-600">Klik untuk pilih gambar</span>
                <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)">
            </label>

            <div id="preview-container" class="mt-4 hidden">
                <p class="text-sm text-gray-600 mb-2">Preview Gambar:</p>
                <img id="image-preview" src="#" alt="Preview" class="max-h-40 rounded-xl shadow-md">
            </div>
        </div>


        {{-- Lokasi --}}
        <div>
            <label for="id_location" class="block font-semibold text-gray-700 mb-2">Lokasi Barang</label>
            <select name="id_location" id="id_location"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" {{ old('id_location') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status Barang (Admin Only) --}}
        @if ($isAdmin)
        <div>
            <label for="status" class="block font-semibold text-gray-700 mb-2">Status Barang</label>
            <select name="status" id="status"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Pilih Status --</option>
                @foreach ($statusList as $status)
                    <option value="{{ $status }}">{{ strtoupper($status) }}</option>
                @endforeach
            </select>
        </div>
        @endif

        {{-- Tombol --}}
        <div class="md:col-span-2 flex gap-4 mt-4">
            <a href="{{ route('barang.index') }}"
                class="flex-1 text-center py-3 rounded-lg text-base font-semibold bg-gray-400 text-white hover:bg-gray-600 transition">
                Batal
            </a>
            <button type="submit"
                class="flex-1 bg-blue-600 text-white py-3 rounded-lg text-base font-semibold hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
