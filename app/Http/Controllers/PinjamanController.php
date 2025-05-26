<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['peminjaman'] = Pinjaman::all();

        return view('peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman.create');
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
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'nama_peminjam' => 'required',
            'status' => 'required',
            'id_barang' => 'required',
        ]);

        Pinjaman::create([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_pinjam' => $req->tanggal_pinjam,
            'tanggal_kembali' => $req->tanggal_kembali,
            'nama_peminjam' => $req->nama_peminjam,
            'status' => $req->status,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('peminjaman.index');
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
        $peminjaman = Pinjaman::where('id', $id)->first();

        return view('peminjaman.edit', $peminjaman);
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
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'nama_peminjam' => 'required',
            'status' => 'required',
            'id_barang' => 'required',
        ]);

        Pinjaman::where('id', $id)->update([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_pinjam' => $req->tanggal_pinjam,
            'tanggal_kembali' => $req->tanggal_kembali,
            'nama_peminjam' => $req->nama_peminjam,
            'status' => $req->status,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pinjaman::where('id', $id)->delete();

        return redirect('peminjaman.index');
    }
}
