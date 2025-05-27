<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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
        $user = auth()->user();

        if ($user->status === 'admin') {
            $barang_keluar = BarangKeluar::with('barang')->get();
        } else {
            $barang_keluar = BarangKeluar::whereHas('barang', function ($q) use ($user) {
                $q->where('status', $user->status);
            })->with('barang')->get();
        }

        return view('barang-keluar.index', compact('barang_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('barang-keluar.create', compact('barang'));
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

        return redirect()->route('barang-keluar.index')->with('success', 'Data berhasil diupdate!');
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
