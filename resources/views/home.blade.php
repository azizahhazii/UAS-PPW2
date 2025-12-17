@extends('base')

@section('title', 'Dashboard')
@section('menuhome', 'underline decoration-4 underline-offset-7')

@section('content')
<section class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
    
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang! 👋</h1>
        <p class="text-gray-600">
            Ini adalah aplikasi manajemen kepegawaian. Anda dapat mengelola data pegawai dan pekerjaan melalui menu di atas.
        </p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-700 mb-4 border-b pb-2">Statistik Pegawai</h2>
        
        <div class="relative h-64 w-full">
            <canvas id="myChart"></canvas>
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    // Mengambil data dari Controller yang dikirim via Blade
    const labels = {!! json_encode($labels) !!};
    const data = {!! json_encode($counts) !!};

    new Chart(ctx, {
        type: 'bar', // Bisa diganti 'pie', 'line', 'doughnut'
        data: {
            labels: labels, // Nama Pekerjaan
            datasets: [{
                label: 'Jumlah Pegawai',
                data: data, // Jumlah Pegawai
                borderWidth: 1,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // Biru
                    'rgba(255, 99, 132, 0.6)', // Merah
                    'rgba(255, 206, 86, 0.6)', // Kuning
                    'rgba(75, 192, 192, 0.6)', // Hijau
                    'rgba(153, 102, 255, 0.6)', // Ungu
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Supaya angka di sumbu Y bulat (1, 2, 3), bukan pecahan
                    }
                }
            }
        }
    });
</script>
@endsection