@extends('layouts.app')

@section('content')
<div class="w-full max-w-6xl mx-auto mt-10 bg-white p-10 rounded-xl shadow-md">
    <h3 class="text-2xl font-bold mb-8 text-gray-700 text-center">Tambah Barang Keluar</h3>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-5 rounded-md mb-6">
            <strong>Oops!</strong> Ada kesalahan:
            <ul class="mt-2 list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang-keluar.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div>
            <label class="block font-medium text-gray-700">Kode Barang</label>
            <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"
                   class="w-full border px-4 py-2 rounded-md" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah') }}"
                   class="w-full border px-4 py-2 rounded-md" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}"
                   class="w-full border px-4 py-2 rounded-md" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Keterangan</label>
            <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                   class="w-full border px-4 py-2 rounded-md" required>
        </div>

        <div class="md:col-span-2">
            <label class="block font-medium text-gray-700">Pilih Barang</label>
            <select name="id_barang" class="w-full border px-4 py-2 rounded-md" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barang as $barang)
                    <option value="{{ $barang->id }}" {{ old('id_barang') == $barang->id ? 'selected' : '' }}>
                        {{ $barang->name }} ({{ strtoupper($barang->status) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="md:col-span-2 flex gap-4 mt-6">
            <a href="{{ route('barang-keluar.index') }}"
               class="flex-1 text-center bg-gray-400 text-white py-2 rounded-md hover:bg-gray-600">Batal</a>
            <button type="submit"
                    class="flex-1 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
