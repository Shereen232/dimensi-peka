@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-6">
  <h2 class="text-2xl font-semibold text-gray-700 mb-6">Data Wilayah</h2>

  <form method="GET" class="flex justify-end mb-4">
    <select name="kondisi" class="border rounded p-2 mr-2">
      <option value="">Pilih Kondisi</option>
      <option value="NORMAL" {{ $kondisi == 'NORMAL' ? 'selected' : '' }}>Normal</option>
      <option value="BORDERLINE" {{ $kondisi == 'BORDERLINE' ? 'selected' : '' }}>Borderline</option>
      <option value="ABNORMAL" {{ $kondisi == 'ABNORMAL' ? 'selected' : '' }}>Abnormal</option>
    </select>
    <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Filter</button>
  </form>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @foreach($wilayah as $w)
    <div class="bg-white p-4 rounded shadow">
      <p class="text-gray-700 font-semibold text-center text-lg">{{ $w->total }} Orang</p>
      <p class="text-gray-500 text-center text-sm">Total Wilayah {{ $w->alamat }}</p>
    </div>
    @endforeach
  </div>

  <canvas id="wilayahChart" class="w-full max-w-2xl mx-auto"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const data = {
    labels: {!! json_encode($wilayah->pluck('alamat')) !!},
    datasets: [{
      label: 'Jumlah Responden',
      data: {!! json_encode($wilayah->pluck('total')) !!},
      backgroundColor: ['#f87171', '#60a5fa', '#34d399', '#fbbf24', '#a78bfa'],
      hoverOffset: 4
    }]
  };

  new Chart(document.getElementById('wilayahChart'), {
    type: 'pie',
    data: data,
  });
</script>
@endpush
