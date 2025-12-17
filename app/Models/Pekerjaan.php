<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerjaan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pekerjaan';

    // ✅ INI YANG MEMPERBAIKI ERROR "Add [nama] to fillable"
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    // relasi (untuk withCount)
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'pekerjaan_id');
    }
}
