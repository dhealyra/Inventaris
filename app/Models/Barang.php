<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'merk',
        'image',
        'stock',
        'status',
    ];

    public $timestamps = true;

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }
    
    public function deleteImage(){
        if($this->image && file_exists(public_path('image/barang' . $this->image))) {
            return unlink(public_path('image/barang' . $this->image));
        }
    }
}
