@extends('layouts.admin')
@section('page-title', 'Data Barang Keluar / Lihat')

@section('content')
    @include('sweetalert::alert')

    <div class="row g-4 mb-5">
        <!-- Gambar dan info singkat produk -->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top mt-5" src="{{ asset('/image/barang/' . $barang->foto) }}" alt="Card image cap" />
                <div class="card-body">

                </div>
            </div>
        </div>

        <!-- Detail dan aksi pembelian -->
        <div class="col-md-12 col-lg-8">

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title">{{ $barang->nama . ' - ' . $barang->merek }}</h5>
                        <div class="card-subtitle text-muted">
                            {{ $barang->kode_barang }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('barang.index') }}">
                            <button class="btn btn-outline-secondary">
                                Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">
                                <i class="bx bx-download" style="position: relative; bottom: 2px;"></i>
                                Jumlah Stock
                            </span>
                            <h2 class="card-title mb-0 text-primary">{{ $barang->stok }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">
                                <i class="bx bx-download" style="position: relative; bottom: 2px;"></i>
                                Tanggal Barang Terdaftar
                            </span>
                            <h2 class="card-title mb-0 text-primary">
                                {{ \Carbon\Carbon::parse($barang->created_at)->translatedFormat('l, d F Y') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection
