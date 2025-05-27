@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Daftar Barang Masuk</h2>

    {{-- Form Filter Pencarian --}}
    <form method="GET" action="{{ route('barang-masuk.index') }}" class="mb-6 flex flex-wrap gap-4 justify-center items-end">
        <div>
            <label for="search" class="block mb-1 font-medium">Cari Barang</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                placeholder="Nama atau merk barang..."
                class="border border-gray-300 rounded-md px-3 py-2 w-60">
        </div>

        <div>
            <label for="start_date" class="block mb-1 font-medium">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                class="border border-gray-300 rounded-md px-3 py-2">
        </div>

        <div>
            <label for="end_date" class="block mb-1 font-medium">Tanggal Akhir</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                class="border border-gray-300 rounded-md px-3 py-2">
        </div>

        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
            Filter
        </button>
    </form>

    {{-- Tabel Daftar Barang Masuk --}}
    <div class="overflow-auto rounded-lg shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-3">Kode Barang</th>
                    <th class="px-4 py-3">Nama Barang</th>
                    <th class="px-4 py-3">Merk</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal Masuk</th>
                    <th class="px-4 py-3">Jumlah Masuk</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($barang as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $item->kode_barang ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $item->barang->nama ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $item->barang->merek ?? '-' }}</td>
                        <td class="px-4 py-3">{{ strtoupper($item->status ?? '-') }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah_masuk ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500 italic">
                            Data barang masuk tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $barang->withQueryString()->links() }}
    </div>
</div>
@endsection
