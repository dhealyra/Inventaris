@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h4 class="text-2xl font-semibold text-gray-700 mb-6">Tambah Data Lokasi</h4>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('locations.store') }}" method="POST" class="flex flex-col gap-6">
            @csrf

            <div>
                <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                <select id="jurusan" name="jurusan" required
                    class="py-3 px-4 block w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="RPL">RPL</option>
                    <option value="TBSM">TBSM</option>
                    <option value="TKRO">TKRO</option>
                    <option value="UMUM">UMUM</option>
                </select>
            </div>

            <!-- NAMA RUANGAN -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Ruangan</label>
                <input type="text" name="name" id="name" required
                    class="py-3 px-4 block w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Contoh: Lab RPL">
            </div>

            <!-- DESKRIPSI -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="py-3 px-4 block w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Tulis deskripsi ruangan jika perlu..."></textarea>
            </div>

            <!-- BUTTON -->
            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md">
                    Simpan
                </button>
                <a href="{{ route('locations.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-md">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
