<?php

namespace App\Exports;
use App\Models\Location;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LocationExport implements FromView
{
    protected $jurusan;

    public function __construct($jurusan = null)
    {
        $this->jurusan = $jurusan;
    }

    public function view(): View
    {
        $query = Location::query();

        if ($this->jurusan) {
            $query->where('jurusan', $this->jurusan);
        }

        return view('exports.location', [
            'locations' => $query->get()
        ]);
    }
}
