@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
  <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Statistik Responden per Jenis Kelamin</h2>

  {{-- Filter --}}
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

  {{-- Card per Jenis Kelamin --}}
 <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
  @foreach($jenisKelamin as $item)
    <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition duration-300">
      <p class="text-blue-600 font-bold text-center text-xl">{{ $item->total }} Orang</p>
      <p class="text-gray-500 text-center text-sm mt-2">
        {{ $item->jenis_kelamin === 'L' ? 'Laki-laki' : ($item->jenis_kelamin === 'P' ? 'Perempuan' : 'Tidak Diketahui') }}
      </p>
    </div>
  @endforeach
</div>


  {{-- Grafik --}}
  <div class="max-w-2xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-md">
      <canvas id="genderChart" width="400" height="400"></canvas>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('genderChart');

    if (ctx) {
      const data = {
        labels: {!! json_encode($jenisKelamin->pluck('jenis_kelamin')) !!},
        datasets: [{
          label: 'Jumlah Responden per Jenis Kelamin',
          data: {!! json_encode($jenisKelamin->pluck('total')) !!},
          backgroundColor: ['#60a5fa', '#f87171'],
          hoverOffset: 6
        }]
      };

      new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
          plugins: {
            legend: {
              position: 'bottom'
            }
          }
        }
      });
    }
  });
</script>
@endpush
