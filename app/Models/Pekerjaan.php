<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerjaan extends Model
{
    use HasFactory, SoftDeletes;  // <-- TAMBAHAN SoftDeletes

    protected $table = 'pekerjaan';
    
    protected $fillable = [
        // ... kolom-kolom yang ada
    ];
    
    // ... kode lainnya
}