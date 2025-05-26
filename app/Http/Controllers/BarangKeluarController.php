<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang_keluar'] = BarangKeluar::all();

        return view('barang-keluar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang-keluar.create');
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
            'tanggal_keluar' => 'required',
            'keterangan' => 'required',
            'id_barang' => 'required',
        ]);

        BarangKeluar::create([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_keluar' => $req->tanggal_keluar,
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
        $barang_keluar = BarangKeluar::where('id', $id)->first();

        return view('barang-keluar.edit', $barang_keluar);
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
            'tanggal_keluar' => 'required',
            'keterangan' => 'required',
            'id_barang' => 'required',
        ]);

        BarangKeluar::where('id', $id)->update([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_keluar' => $req->tanggal_keluar,
            'keterangan' => $req->keterangan,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('barang-keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangKeluar::where('id', $id)->delete();

        return redirect('barang-keluar.index');
    }
}
