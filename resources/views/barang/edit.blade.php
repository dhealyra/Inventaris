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

        {{-- Lokasi Barang --}}
        <div>
            <label for="id_location" class="block mb-2 font-medium text-gray-700">Lokasi Barang</label>
            <select name="id_location" id="id_location"
                class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" {{ old('id_location', $barang->id_location) == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status Barang --}}
        @if ($isAdmin)
        <div class="md:col-span-2">
            <label for="status" class="block mb-2 font-medium text-gray-700">Status Barang</label>
            <select name="status" id="status"
                class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Pilih Status --</option>
                @foreach ($statusList as $status)
                    <option value="{{ $status }}" {{ old('status', $barang->status) == $status ? 'selected' : '' }}>
                        {{ strtoupper($status) }}
                    </option>
                @endforeach
            </select>
        </div>
        @endif

        {{-- Gambar Saat Ini --}}
        
        <div class="md:col-span-2 flex flex-col items-center justify-center text-center">
            <label class="block mb-2 font-medium text-gray-700">Gambar Saat Ini</label>
            @if ($barang->image)
                <img src="{{ asset('image/barang/' . $barang->image) }}" class="w-32 h-auto rounded-lg shadow">
            @else
                <p class="text-sm text-gray-500 italic">Tidak ada gambar</p>
            @endif
        </div>



        {{-- Upload Gambar Baru --}}
        <div class="md:col-span-2">
            <label for="image" class="block font-semibold text-gray-700 mb-2">Upload Foto Baru(Opsional)</label>
            <label for="image" id="upload-button"
                class="flex items-center gap-3 px-6 py-4 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-blue-50 transition duration-200">
                <img id="icon-preview" src="https://cdn-icons-png.flaticon.com/512/1829/1829586.png" alt="Upload Icon" class="w-10 h-10 object-cover rounded-md">
                <span class="text-sm text-gray-600">Klik untuk pilih gambar</span>
                <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)">
            </label>
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
