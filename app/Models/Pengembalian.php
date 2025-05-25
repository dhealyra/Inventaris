<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangId',
        'pinjamanId',
        'jumlah',
        'tglKembali',
        'status',
    ];

    public $timestamps = true;
    
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
