<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'jurusan',
        'name',
        'description',
        'status',
    ];

    public $timestamps = true;
    
}
