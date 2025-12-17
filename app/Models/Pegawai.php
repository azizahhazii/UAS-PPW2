<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // <-- Tambahan softdeletes

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;  // <-- Tambahan softdeletes

    protected $table = 'pegawai';
    
    protected $fillable = [
        // ... kolom-kolom yang ada
    ];
    
    // ... kode lainnya
}