@extends('base')
@section('title','Pekerjaan')
@section('menupekerjaan', 'underline decoration-4 underline-offset-7')
@section('content')
    <section class="p-4 bg-white rounded-lg min-h-[50vh]">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">Pekerjaan</h1>
        <div class="mx-auto max-w-screen-xl">
            
            {{-- TASK 10: Notifikasi Berhasil --}}
            @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-50 border border-green-200 p-4">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('pekerjaan.add') }}" class="rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700">
                    Tambah Data
                </a>
                <form class="flex w-full max-w-sm gap-2" autocomplete="off">
                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Masukkan kata kunci..." class="w-full rounded-md border px-3 py-2 text-sm">
                    <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700 cursor-pointer">
                        Cari
                    </button>
                </form>
            </div>
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-x divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700" width="1">No</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Pekerjaan</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Deskripsi</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Jumlah Pegawai</th>
                        <th class="px-4 py-3 text-center font-semibold text-gray-700" width="1"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($data as $k => $d)
                        <tr class="hover:bg-gray-50">
                            {{-- TASK 11: Pagination - Fix nomor urut --}}
                            <td class="px-4 py-3">{{ ($data->currentPage() - 1) * $data->perPage() + $k + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $d->nama }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $d->deskripsi }}</td>
                            {{-- TASK 12: Jumlah Pegawai Dinamis --}}
                            <td class="px-4 py-3 text-gray-600">{{ $d->pegawai_count }}</td>
                            <td class="px-4 py-3 text-center text-gray-600">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <a href="{{ route('pekerjaan.edit', ['id' => $d->id]) }}" class="cursor-pointer rounded-l-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-blue-600 hover:bg-blue-50">
                                        Edit
                                    </a>
                                    <form action="{{ route('pekerjaan.destroy', ['id' => $d->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cursor-pointer rounded-r-md border border-l-0 border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <p class="font-medium">Tidak ada data pekerjaan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- TASK 11: Pagination Links --}}
            @if($data->hasPages())
                <div class="mt-4">
                    {{ $data->links() }}
                </div>
            @endif

        </div>
    </section>
@endsection