@extends('layouts.admin')
@section('page-title', 'Data Barang keluar / Ubah')

@section('content')
    @include('sweetalert::alert')

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah data barang</h5>
                <a href="{{ route('brg-keluar.index') }}">
                    <button class="btn btn-outline-secondary">
                        Kembali
                    </button>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('brg-keluar.update', $barangKeluar->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Pilih Barang</label>
                        <div class="col-sm-10">
                            <div class="dropdown">
                                <button style="text-align: left;" class="w-100 btn btn-outline-secondary dropdown-toggle"
                                    type="button" id="dropdownBarang" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i style="position: relative; right: 8px; bottom: 2px;" class="bx bx-box"></i>
                                    Pilih Barang
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownBarang" style="width: 100%;">
                                    @foreach ($barang as $item)
                                        <li>
                                            <a class="dropdown-item d-flex align-items-start" href="#"
                                                onclick="pilihBarang('{{ $item->id }}', '{{ $item->nama }}', '{{ $item->merek }}')">
                                                <img src="{{ asset('image/barang/' . $item->foto) }}"
                                                    alt="{{ $item->nama }}" width="50" height="50"
                                                    class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <div><strong>{{ $item->nama }}</strong> - {{ $item->merek }}</div>
                                                    <small class="text-muted">Stok: {{ $item->stok }}</small>
                                                </div>
                                            </a>
                                            <hr class="my-1">
                                        </li>
                                    @endforeach
                                </ul>
                                @error('id_barang')
                                    <div class="invalid-feedback d-block mt-1 d-flex gap-1" style="margin-left: 15px;">
                                        <i class="bx bx-error-circle"></i>
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <input type="hidden" name="id_barang" id="id_barang">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jumlah</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-hash"></i></span>
                                <input name="jumlah" type="number" class="form-control" placeholder="0"
                                    aria-label="Samsung" aria-describedby="basic-icon-default-company2"
                                    value="{{ $barangKeluar->jumlah }}" />
                            </div>
                        </div>
                        @error('jumlah')
                            <div class="invalid-feedback d-block mt-1 d-flex gap-1" style="margin-left: 15px;">
                                <i class="bx bx-error-circle"></i>
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tanggal keluar</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-calendar"></i></span>
                                <input name="tanggal_keluar" type="date" class="form-control" placeholder="0"
                                    value="{{ \Carbon\Carbon::parse($barangKeluar->tanggal_keluar)->format('Y-m-d') }}" />
                            </div>
                        </div>
                        @error('tanggal_keluar')
                            <div class="invalid-feedback d-block mt-1 d-flex gap-1" style="margin-left: 15px;">
                                <i class="bx bx-error-circle"></i>
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-note"></i></span>
                                <input name="keterangan" type="text" class="form-control"
                                    placeholder="Barang dalam keadaan baik" value="{{ $barangKeluar->keterangan }}" />
                            </div>
                        </div>
                        @error('keterangan')
                            <div class="invalid-feedback d-block mt-1 d-flex gap-1" style="margin-left: 15px;">
                                <i class="bx bx-error-circle"></i>
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@isset($barangKeluar)
    @php
        $selectedBarangId = old('id_barang', $barangKeluar->id_barang);
        $selectedBarang = $barang->firstWhere('id', $selectedBarangId);
    @endphp

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectedId = '{{ $selectedBarangId }}';
            const dropdownBtn = document.getElementById('dropdownBarang');
            const inputIdBarang = document.getElementById('id_barang');

            if (selectedId) {
                inputIdBarang.value = selectedId;
                dropdownBtn.innerHTML = `
                    <i style="position: relative; right: 8px; bottom: 2px;" class="bx bx-box"></i>
                    {{ $selectedBarang ? $selectedBarang->nama . ' - ' . $selectedBarang->merek : 'Pilih Barang' }}`;
            }
        });

        function pilihBarang(id, nama, merek) {
            document.getElementById('id_barang').value = id;
            document.getElementById('dropdownBarang').innerHTML =
                `<i style="position: relative; right: 8px; bottom: 2px;" class="bx bx-box"></i> ${nama} - ${merek}`;
        }
    </script>
@endisset
