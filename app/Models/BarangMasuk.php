<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuks';

    protected $fillable = [
        'kode_barang',
        'id_barang',
        'tanggal_masuk',
        'keterangan',
    ];

    public $timestamps = true;
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
