@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Lokasi Ruangan</h1>

    <!-- Filter Jurusan -->
    <div class="mb-4">
        <span>Filter Jurusan: </span>

        @php
            $jurusanList = ['RPL', 'TKRO', 'TBSM', 'UMUM'];
            $activeJurusan = request('jurusan');
        @endphp

        @foreach ($jurusanList as $jurusan)
            <a href="{{ route('locations.index', ['jurusan' => $jurusan]) }}"
                class="btn btn-sm {{ $activeJurusan == $jurusan ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ $jurusan }}
            </a>
        @endforeach

        <!-- Tombol Reset Filter -->
        @if ($activeJurusan)
            <a href="{{ route('locations.index') }}" class="btn btn-sm btn-secondary ms-2">
                Reset
            </a>
        @endif
    </div>

    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">
        + Tambah Data Lokasi
    </a>

    <form action="{{ route('locations.export') }}" method="GET" class="d-inline">
        <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
        <button type="submit" class="btn btn-success btn-sm">Export Sesuai Filter</button>
    </form>

    <form action="{{ route('locations.export') }}" method="GET" class="d-inline">
        <button type="submit" class="btn btn-secondary btn-sm">Export Semua</button>
    </form>

    <!-- Tabel lokasi -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Jurusan</th>
                    <th>Nama Ruangan</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($locations as $location)
                    <tr>
                        <td>{{ $location->code }}</td>
                        <td>{{ $location->jurusan }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->description ?? '-' }}</td>
                        <td>
                            @if($location->status === 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data lokasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
