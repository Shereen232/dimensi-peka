@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Statistik Responden per Kelurahan</h2>

  {{-- Filter Kondisi --}}
  <form method="GET" class="flex flex-col md:flex-row justify-end items-center mb-6 gap-3">
    <div>
      <select name="kondisi" class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300">
        <option value="">Pilih Kondisi</option>
        <option value="NORMAL" {{ $kondisi == 'NORMAL' ? 'selected' : '' }}>Normal</option>
        <option value="BORDERLINE" {{ $kondisi == 'BORDERLINE' ? 'selected' : '' }}>Borderline</option>
        <option value="ABNORMAL" {{ $kondisi == 'ABNORMAL' ? 'selected' : '' }}>Abnormal</option>
      </select>
    </div>
    <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded transition">Filter</button>
  </form>

  {{-- Total Responden --}}
  <div class="text-center mb-8">
    <span class="text-lg text-gray-700 font-semibold">
      Total Responden{{ $kondisi ? ' dengan kondisi ' . $kondisi : '' }}: {{ $totalResponden }}
    </span>
  </div>

  {{-- Card per Wilayah --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
    @foreach($wilayah as $w)
    <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-lg transition duration-300">
      <p class="text-blue-600 font-bold text-center text-xl">{{ $w->total }} Orang</p>
      <p class="text-gray-500 text-center text-sm mt-2">Kelurahan {{ $w->kelurahan }}</p>
    </div>
    @endforeach
  </div>

  {{-- Grafik --}}
  <div class="max-w-xl mx-auto">
    <div class="bg-white p-3 rounded-xl shadow-md">
      <canvas id="wilayahChart" width="400" height="400"></canvas>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('wilayahChart');

    if (ctx) {
      const data = {
        labels: {!! json_encode($wilayah->pluck('kelurahan')) !!},
        datasets: [{
          label: 'Jumlah Responden per Kelurahan',
          data: {!! json_encode($wilayah->pluck('total')) !!},
          backgroundColor: [
            '#60a5fa', '#34d399', '#fbbf24', '#f87171', '#a78bfa',
            '#fb923c', '#4ade80', '#38bdf8', '#c084fc', '#f472b6',
            '#10b981', '#facc15', '#818cf8', '#f97316'
          ],
          hoverOffset: 6
        }]
      };

      new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                font: {
                  size: 12
                }
              }
            }
          }
        }
      });
    }
  });
</script>
@endpush
