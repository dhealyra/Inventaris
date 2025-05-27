<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Mulai bikin query utama
        $query = BarangMasuk::with('barang')
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('barang', function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%$keyword%")
                    ->orWhere('merek', 'like', "%$keyword%");
                });
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_masuk', [$startDate, $endDate]);
            })
            ->when($startDate && !$endDate, function ($query) use ($startDate) {
                $query->whereDate('tanggal_masuk', '>=', $startDate);
            })
            ->when(!$startDate && $endDate, function ($query) use ($endDate) {
                $query->whereDate('tanggal_masuk', '<=', $endDate);
            })
            ->when($user->status_user !== 'admin', function ($query) use ($user) {
                $query->whereHas('barang', function ($q) use ($user) {
                    $q->where('status', $user->status_user);
                });
            });

        // Tambahan pencarian di kolom sendiri (kode_barang, merk, code, status)
        if ($keyword) {
            $query->orWhere('kode_barang', 'like', "%$keyword%")
                ->orWhere('merk', 'like', "%$keyword%")
                ->orWhere('code', 'like', "%$keyword%")
                ->orWhere('status', 'like', "%$keyword%");
        }

        // Ambil data dengan pagination
        $barang = $query->orderBy('id', 'asc')->paginate(100);

        return view('barang-masuk.index', compact('barang'));
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

        return redirect('barang-masuk.index');
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
