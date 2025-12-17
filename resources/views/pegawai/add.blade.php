@extends('base')
@section('title','Tambah Pegawai')
@section('menupegawai', 'underline decoration-4 underline-offset-7')
@section('content')
    <section class="p-4 bg-white rounded-lg min-h-[50vh]">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">Tambah Data Pegawai</h1>
        
        <div class="mx-auto max-w-2xl">
            @if($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4">
                <div class="flex items-start">
                    <svg class="h-5 w-5 text-red-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="font-medium text-red-800 mb-2">Terjadi kesalahan:</p>
                        <ul class="list-disc list-inside text-red-700 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                           placeholder="Masukkan nama lengkap" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                           placeholder="contoh@email.com" required>
                </div>

                <div>
                    <label for="pekerjaan_id" class="block text-sm font-medium text-gray-700 mb-1">
                        Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <select name="pekerjaan_id" id="pekerjaan_id" 
                            class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                            required>
                        <option value="">-- Pilih Pekerjaan --</option>
                        @foreach($pekerjaan as $p)
                            <option value="{{ $p->id }}" {{ old('pekerjaan_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Kelamin <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="male" 
                                   {{ old('gender') == 'male' ? 'checked' : '' }}
                                   class="mr-2" required>
                            <span class="text-sm">Male</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="female" 
                                   {{ old('gender') == 'female' ? 'checked' : '' }}
                                   class="mr-2" required>
                            <span class="text-sm">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center">
                            <input type="radio" name="is_active" value="1" 
                                   {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                                   class="mr-2" required>
                            <span class="text-sm">Aktif</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="is_active" value="0" 
                                   {{ old('is_active') == '0' ? 'checked' : '' }}
                                   class="mr-2" required>
                            <span class="text-sm">Nonaktif</span>
                        </label>
                    </div>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" 
                            class="rounded-md bg-green-600 px-6 py-2 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Simpan
                    </button>
                    <a href="{{ route('pegawai.index') }}" 
                       class="rounded-md bg-gray-500 px-6 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection