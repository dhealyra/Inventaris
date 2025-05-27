@extends('layouts.app')

@section('content')
<div class="w-full px-4 sm:px-8 mt-12">
    <div class="w-full bg-white p-6 sm:p-10 rounded-xl shadow-lg">
        <h4 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Data Barang Keluar</h4>

        <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <a href="{{ route('barang-keluar.create') }}"
               class="py-2 px-6 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
               + Tambah Barang Keluar
            </a>

            <form method="GET" action="{{ route('barang-keluar.index') }}" class="w-full md:w-1/3">
                <input type="text" name="search" placeholder="Cari kode barang..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-500"
                    value="{{ request('search') }}">
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-full text-sm border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-left">
                    <tr>
                        <th class="px-4 py-3 border">Kode</th>
                        <th class="px-4 py-3 border">Jumlah</th>
                        <th class="px-4 py-3 border">Tanggal</th>
                        <th class="px-4 py-3 border">Keterangan</th>
                        <th class="px-4 py-3 border">Status</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang_keluar as $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">{{ $item->kode_barang }}</td>
                            <td class="px-4 py-3 border">{{ $item->jumlah }}</td>
                            <td class="px-4 py-3 border">{{ $item->tanggal_keluar }}</td>
                            <td class="px-4 py-3 border">{{ $item->keterangan }}</td>
                            <td class="px-4 py-3 border">{{ strtoupper($item->barang->status ?? '-') }}</td>
                            <td class="px-4 py-3 border text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('barang-keluar.edit', $item->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('barang-keluar.destroy', $item->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin mau hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500 italic">Belum ada data barang keluar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination kalau ada --}}
        @if ($barang_keluar instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="mt-6">
                {{ $barang_keluar->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
