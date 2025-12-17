<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Pekerjaan::withCount('pegawai')->get();
        $labels = $data->pluck('nama'); 
        $counts = $data->pluck('pegawai_count'); 

        return view('home', compact('labels', 'counts'));
    }
}