<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Barang::query();
        $user = Auth::user();

        if ($user->status !== 'admin') {
            $query->where('status', 'barang' . $user->status);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $barang = $query->get();

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $statusList = ['rpl', 'tkr', 'tsm', 'umum'];

        return view('barang.create', [
            'statusList' => $statusList,
            'isAdmin' => $user->status == 'admin' 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'merk'  => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'status' => $user->role === 'admin' ? 'required|in:rpl,tkr,tsm,umum' : '', // validasi status klo admin
        ]);

        $status = $user->status === 'admin' ? $request->status : $user->status_user;

        $lastRecord = Barang::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $code = 'B-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        $barang = new Barang;
        $barang->code = $code;
        $barang->name = $request->name;
        $barang->merk = $request->merk;
        $barang->stock = $request->stock;
        $barang->status = $status;

        if($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('image/barang', $name);
            $barang->image = $name;
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
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
        $user = Auth::user();
        if ($user->status_user == 'admin') {
            $barang = Barang::findOrFail($id);
        } else {
            $barang = Barang::where('status', $user->status_user)
                        ->where('id', $id)
                        ->firstOrFail();
        }

        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'merk'  => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->name  = $request->name;
        $barang->merk  = $request->merk;
        $barang->stock = $request->stock;

        if($request->hasFile('image')) {
            $barang->deleteImage();
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('image/barang', $name);
            $barang->image = $name;
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        
        if ($barang->foto && file_exists(public_path('image/barang/' . $barang->foto))) {
            unlink(public_path('image/barang/' . $barang->foto));
        }

        $barang->delete();
        return redirect()->route('barang.index');
    }
}
