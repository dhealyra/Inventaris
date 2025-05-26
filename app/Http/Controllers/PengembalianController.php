<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengembalian'] = Pengembalian::all();

        return view('pengembalian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengembalian.create');
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
            'tanggal_kembali' => 'required',
            'nama_peminjam' => 'required',
            'status' => 'required',
            'id_peminjam' => 'required',
            'id_barang' => 'required',
        ]);

        Pengembalian::create([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_kembali' => $req->tanggal_kembali,
            'nama_peminjam' => $req->nama_peminjam,
            'status' => $req->status,
            'id_peminjam' => $req->id_peminjam,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('pengembalian.index');
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
        $pengembalian = Pengembalian::where('id', $id)->first();

        return view('pengembalian.edit', $pengembalian);
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
            'tanggal_kembali' => 'required',
            'nama_peminjam' => 'required',
            'status' => 'required',
            'id_peminjam' => 'required',
            'id_barang' => 'required',
        ]);

        Pengembalian::where('id', $id)->update([
            'kode_barang' => $req->kode_barang,
            'jumlah' => $req->jumlah,
            'tanggal_kembali' => $req->tanggal_kembali,
            'nama_peminjam' => $req->nama_peminjam,
            'status' => $req->status,
            'id_peminjam' => $req->id_peminjam,
            'id_barang' => $req->id_barang,
        ]);

        return redirect('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengembalian::where('id', $id)->delete();

        return redirect('pengembalian.index');
    }
}
