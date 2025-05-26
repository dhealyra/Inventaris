<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang_masuk'] = BarangMasuk::all();

        return view('barang-masuk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'kode_barang' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
            'keterangan' => 'required',
            'id_barang' => 'required',
        ]);

        BarangMasuk::create([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_masuk' => $req->tanggal_masuk,
            'keterangan' => $req->keterangan,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('barang-keluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_masuk = BarangMasuk::where('id', $id)->first();

        return view('barang-masuk.edit', $barang_masuk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'kode_barang' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
            'keterangan' => 'required',
            'id_barang' => 'required',
        ]);

        BarangMasuk::where('id', $id)->update([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_masuk' => $req->tanggal_masuk,
            'keterangan' => $req->keterangan,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('barang-masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangMasuk::where('id', $id)->delete();

        return redirect('barang-masuk.index');
    }
}
