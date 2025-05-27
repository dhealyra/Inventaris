@extends('layouts.app')


@section('content')
<div class="grid grid-cols-1 lg:grid-cols-5 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="card lg:col-span-5 col-span-1"> 
        <div class="col-span-2">
			<div class="card h-full">
				<div class="card-body">
					<h4 class="text-2xl font-semibold text-gray-700 mb-6">Daftar Barang</h4>

                    {{-- Filter Status (hanya untuk admin) --}}
                    @php
                        $user = Auth::user();
                        $statusList = ['umum', 'rpl', 'tkr', 'tsm'];
                        $activeStatus = request('status');
                    @endphp

                    @if ($user->status === 'admin')
                        <div class="mt-2 flex flex-wrap gap-2 mb-6">
                            @foreach ($statusList as $status)
                                <a href="{{ route('barang.index', ['status' => $status]) }}"
                                class="px-3 py-1 rounded-md text-sm font-medium
                                    {{ $activeStatus == $status ? 'bg-blue-600 text-white' : 'bg-white border border-blue-600 text-blue-600' }}">
                                    BARANG {{ strtoupper($status) }}
                                </a>
                            @endforeach

                            @if ($activeStatus)
                                <a href="{{ route('barang.index') }}"
                                class="px-3 py-1 rounded-md text-sm font-medium bg-gray-500 text-white">
                                    Reset
                                </a>
                            @endif
                        </div>
                    @endif

                    <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-3">
                        <a href="{{ route('barang.create') }}"
                        class="py-3 px-8 rounded-sm text-sm font-semibold border border-transparent bg-blue-500 text-white hover:bg-blue-500">
                            + Tambah Barang
                        </a>

                        <form method="GET" action="{{ route('barang.index') }}" class="w-full md:w-auto">
                            <input type="text" name="search" placeholder="Cari barang..." value="{{ request('search') }}"
                                class="px-4 py-2 border rounded-md w-full md:w-64 text-sm">
                        </form>
                    </div>


                    <div class="overflow-auto bg-white shadow rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100 text-left text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 font-medium">Kode</th>
                                    <th class="px-4 py-3 font-medium">Nama</th>
                                    <th class="px-4 py-3 font-medium">Merk</th>
                                    <th class="px-4 py-3 font-medium">Stok</th>
                                    <th class="px-4 py-3 font-medium">Status</th>
                                    <th class="px-4 py-3 font-medium">Gambar</th>
                                    <th class="px-4 py-3 font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($barang as $item)
                                    <tr>
                                        <td class="px-4 py-3">{{ $item->code }}</td>
                                        <td class="px-4 py-3">{{ $item->name }}</td>
                                        <td class="px-4 py-3">{{ $item->merk }}</td>
                                        <td class="px-4 py-3">{{ $item->stock }}</td>
                                        <td class="px-4 py-3">{{ strtoupper($item->status) }}</td>
                                        <td class="px-4 py-3">
                                            @if($item->image)
                                                <img src="{{ asset('/image/barang/' . $item->image) }}" alt="gambar" class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-400 italic">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 flex gap-2">
                                            <a href="{{ route('barang.edit', $item->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus barang ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada data barang.</td>
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
