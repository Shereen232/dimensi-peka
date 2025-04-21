@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container mx-auto px-6 py-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100 mb-8">
            Grafik Hasil Kuisioner
        </h2>

        <canvas id="chartKesulitan" class="mb-6"></canvas>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartKesulitan').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($data->pluck('user.name')),
            datasets: [{
                label: 'Skor Total Kesulitan',
                data: @json($data->pluck('total_kesulitan')),
                backgroundColor: 'rgba(99, 102, 241, 0.7)',
                borderColor: 'rgba(99, 102, 241, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
