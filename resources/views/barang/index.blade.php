@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Barang</h1>

    <!-- Filter Status -->
    <div class="mb-4">
        <span>Filter Status Barang:</span>

        @php
            $statusList = ['barangumum', 'barangrpl', 'barangtkr', 'barangtsm'];
            $activeStatus = request('status');
        @endphp

        @foreach ($statusList as $status)
            <a href="{{ route('barang.index', ['status' => $status]) }}"
                class="btn btn-sm {{ $activeStatus == $status ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ strtoupper($status) }}
            </a>
        @endforeach

        <!-- Tombol Reset Filter -->
        @if ($activeStatus)
            <a href="{{ route('barang.index') }}" class="btn btn-sm btn-secondary ms-2">
                Reset
            </a>
        @endif
    </div>

    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">
        + Tambah Barang
    </a>

    <!-- Tabel barang -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->merk }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ strtoupper($item->status) }}</td>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('/image/barang/' . $item->image) }}" width="70" alt="gambar">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin hapus barang ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
