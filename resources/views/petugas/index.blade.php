@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar User Petugas</h1>

    <!-- Filter Status -->
    <div class="mb-4">
        <span>Filter Status: </span>

        @php
            $statusList = ['umum', 'rpl', 'tkr', 'tsm'];
            $activeStatus = request('status');
        @endphp

        @foreach ($statusList as $status)
            <a href="{{ route('petugas.index', ['status' => $status]) }}"
                class="btn btn-sm {{ $activeStatus == $status ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ strtoupper($status) }}
            </a>
        @endforeach

        <!-- Tombol Reset Filter -->
        @if ($activeStatus)
            <a href="{{ route('petugas.index') }}" class="btn btn-sm btn-secondary ms-2">
                Reset
            </a>
        @endif
    </div>

    <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3">
        + Tambah User
    </a>

    <!-- Tabel user -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($petugas as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>PETUGAS {{ strtoupper($user->status) }}</td>
                        <td>
                            <a href="{{ route('petugas.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('petugas.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus user ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
