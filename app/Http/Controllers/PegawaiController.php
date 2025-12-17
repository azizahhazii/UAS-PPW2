<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    // READ - Tampilkan daftar pegawai dengan pagination
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        
        $data = Pegawai::with('pekerjaan')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%")
                      ->orWhere('email', 'like', "%{$keyword}%");
            })
            ->paginate(10)
            ->withQueryString();
        
        return view('pegawai.index', compact('data'));
    }

    // CREATE - Form tambah pegawai
    public function add()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pegawai.add', compact('pekerjaan'));
    }

    // CREATE - Simpan data pegawai
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai,email',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            // Diperbarui agar menerima P, L, male, atau female
            'gender' => 'required|in:P,L,male,female', 
            'is_active' => 'required|boolean',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'pekerjaan_id.required' => 'Pekerjaan wajib dipilih',
            'pekerjaan_id.exists' => 'Pekerjaan tidak valid',
            'gender.required' => 'Gender wajib dipilih',
            'is_active.required' => 'Status wajib dipilih',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new Pegawai();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->pekerjaan_id = $request->pekerjaan_id;
        $data->gender = $request->gender;
        $data->is_active = $request->is_active;

        if ($data->save()) {
            return redirect()->route('pegawai.index')
                ->with('success', 'Data pegawai berhasil ditambahkan');
        } else {
            return redirect()->route('pegawai.index')
                ->with('error', 'Data pegawai gagal disimpan');
        }
    }

    // UPDATE - Form edit pegawai
    public function edit(Request $request)
    {
        $data = Pegawai::findOrFail($request->id);
        $pekerjaan = Pekerjaan::all();
        return view('pegawai.edit', compact('data', 'pekerjaan'));
    }

    // UPDATE - Update data pegawai
    public function update(Request $request)
    {
        // Debugging (dd) sudah dihapus agar proses berlanjut ke database
        
        // Cari bagian $validator = ... di function update
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:pegawai,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai,email,' . $request->id,
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            
            // HANYA TERIMA male ATAU female
            'gender' => 'required|in:male,female', 
            
            'is_active' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pegawai::findOrFail($request->id);
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->pekerjaan_id = $request->pekerjaan_id;
        $data->gender = $request->gender;
        $data->is_active = $request->is_active;

        if ($data->save()) {
            return redirect()->route('pegawai.index')
                ->with('success', 'Data pegawai berhasil diupdate');
        } else {
            return redirect()->route('pegawai.index')
                ->with('error', 'Data pegawai gagal diupdate');
        }
    }

    // DELETE - Hapus pegawai (soft delete)
    public function destroy(Request $request)
    {
        $data = Pegawai::findOrFail($request->id);
        
        if ($data->delete()) {
            return redirect()->route('pegawai.index')
                ->with('success', 'Data pegawai berhasil dihapus');
        } else {
            return redirect()->route('pegawai.index')
                ->with('error', 'Data pegawai gagal dihapus');
        }
    }
}