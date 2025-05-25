<?php

namespace App\Http\Controllers;

use App\Exports\LocationExport;
use App\Models\Location;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $jurusan = $request->input('jurusan');

        $fileName = 'data_lokasi_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new LocationExport($jurusan), $fileName);
    }

    public function index(Request $request)
    {
        $query = Location::query();

    // filter jurusann
    if ($request->filled('jurusan')) {
        $query->where('jurusan', $request->jurusan);
    }

    $locations = $query->orderBy('name')->get();

    return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'jurusan' => 'required|string',
        'name' => 'required|string',
        'description' => 'nullable|string',
    ]);

    // Hitung jumlah lokasi di jurusan yang sama
    $count = Location::where('jurusan', $request->jurusan)->count() + 1;

    // Generate code otomatis
    $kodeBaru = strtoupper($request->jurusan) . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

    Location::create([
        'code' => $kodeBaru,
        'jurusan' => $request->jurusan,
        'name' => $request->name,
        'description' => $request->description,
        'status' => 'aktif', 
    ]);

    return redirect()->route('locations.index')->with('success', 'Data lokasi berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'jurusan' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string|in:aktif,nonaktif',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
