<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangId',
        'jumlah',
        'tglMasuk',
        'keterangan',
    ];

    public $timestamps = true;
    
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
