<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangId',
        'name',
        'jenis',
        'jumlah',
        'tglPinjam',
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
        return $this->hasMany(Pengembalian::class);
    }
}
