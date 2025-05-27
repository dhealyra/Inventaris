@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white p-10 rounded-xl shadow-lg">

    <h5 class="text-xl font-semibold mb-8 text-center text-gray-700">Tambah Barang</h5>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-5 rounded-md mb-8 border border-red-400">
            <strong class="block mb-2 text-lg">Oops!</strong> Ada kesalahan saat input:
            <ul class="list-disc pl-7 mt-3 space-y-1 text-base">
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
            <label for="name" class="block font-semibold text-gray-700 text-lg mb-2">Nama Barang</label>
            <input type="text" name="name" id="name"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Laptop Acer" value="{{ old('name') }}" required>
        </div>

        {{-- Merk --}}
        <div>
            <label for="merk" class="block font-semibold text-gray-700 text-lg mb-2">Merk</label>
            <input type="text" name="merk" id="merk"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Acer" value="{{ old('merk') }}" required>
        </div>

        {{-- Stok --}}
        <div>
            <label for="stock" class="block font-semibold text-gray-700 text-lg mb-2">Stok</label>
            <input type="number" name="stock" id="stock" min="0"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: 5" value="{{ old('stock') }}" required>
        </div>

        {{-- Foto --}}
        <div>
            <label for="image" class="block font-semibold text-gray-700 text-lg mb-2">Foto Barang (Opsional)</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full border border-gray-300 rounded-lg px-5 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="id_location" class="block font-semibold text-gray-700 text-lg mb-2">Lokasi Barang</label>
            <select name="id_location" id="id_location"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" {{ old('id_location') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status Barang (Hanya untuk Admin) --}}
        @if ($isAdmin)
        <div class="md:col-span-2">
            <label for="status" class="block font-semibold text-gray-700 text-lg mb-2">Status Barang</label>
            <select name="status" id="status"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Pilih Status --</option>
                @foreach ($statusList as $status)
                    <option value="{{ $status }}">{{ strtoupper($status) }}</option>
                @endforeach
            </select>
        </div>
        @endif

        {{-- Tombol Aksi --}}
        <div class="md:col-span-2 flex items-center gap-4 mt-6">
            <a href="{{ route('barang.index') }}"
                class="flex-1 text-center py-3 rounded-lg text-lg font-semibold bg-gray-400 text-white hover:bg-gray-700 transition duration-300">
                Batal
            </a>
            <button type="submit"
                class="flex-1 bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition duration-300">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
