@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-5 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="card lg:col-span-5 col-span-1">
        <div class="col-span-2">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="text-2xl font-semibold text-gray-700 mb-6">Daftar Lokasi Ruangan</h4>

                    @php
                        $user = Auth::user();
                        $jurusanList = ['RPL', 'TKRO', 'TBSM', 'UMUM'];
                        $activeJurusan = request('jurusan');
                    @endphp

                    {{-- Filter Jurusan - hanya admin --}}
                    @if ($user->status === 'admin')
                        <div class="mb-6 flex flex-wrap gap-2">
                            @foreach ($jurusanList as $jurusan)
                                <a href="{{ route('locations.index', ['jurusan' => $jurusan]) }}"
                                   class="px-3 py-1 rounded-md text-sm font-medium
                                   {{ $activeJurusan == $jurusan ? 'bg-blue-600 text-white' : 'bg-white border border-blue-600 text-blue-600' }}">
                                    {{ $jurusan }}
                                </a>
                            @endforeach

                            @if ($activeJurusan)
                                <a href="{{ route('locations.index') }}"
                                   class="px-3 py-1 rounded-md text-sm font-medium bg-gray-500 text-white">
                                    Reset
                                </a>
                            @endif
                        </div>
                    @endif

                    {{-- Tombol + Search --}}
                    <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-3">
                        <a href="{{ route('locations.create') }}"
                           class="py-3 px-6 rounded-sm text-lg font-semibold border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            + Tambah Lokasi
                        </a>

                        <form method="GET" action="{{ route('locations.index') }}" class="w-full md:w-auto">
                            <input type="text" name="search" placeholder="Cari lokasi..." value="{{ request('search') }}"
                                   class="px-4 py-2 border rounded-md w-full md:w-64 text-sm">
                        </form>
                    </div>

                    {{-- Export Buttons --}}
                    <div class="mb-4 flex gap-3">
                        <form action="{{ route('locations.export') }}" method="GET">
                            <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                                Export Sesuai Filter
                            </button>
                        </form>

                        <form action="{{ route('locations.export') }}" method="GET">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm">
                                Export Semua
                            </button>
                        </form>
                    </div>

                    {{-- Tabel --}}
                    <div class="overflow-auto bg-white shadow rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100 text-left text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 font-medium">Kode</th>
                                    <th class="px-4 py-3 font-medium">Jurusan</th>
                                    <th class="px-4 py-3 font-medium">Nama Ruangan</th>
                                    <th class="px-4 py-3 font-medium">Deskripsi</th>
                                    <th class="px-4 py-3 font-medium">Status</th>
                                    <th class="px-4 py-3 font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($locations as $location)
                                    <tr>
                                        <td class="px-4 py-3">{{ $location->code }}</td>
                                        <td class="px-4 py-3">{{ $location->jurusan }}</td>
                                        <td class="px-4 py-3">{{ $location->name }}</td>
                                        <td class="px-4 py-3">{{ $location->description ?? '-' }}</td>
                                        <td class="px-4 py-3">
                                            @if($location->status === 'aktif')
                                                <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Aktif</span>
                                            @else
                                                <span class="bg-gray-400 text-white px-2 py-1 rounded text-xs">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 flex gap-2">
                                            <a href="{{ route('locations.edit', $location->id) }}"
                                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada data lokasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
