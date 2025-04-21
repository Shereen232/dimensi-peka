@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container mx-auto px-6 py-6">
    <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100 mb-8">
      Riwayat Hasil Kuesioner SDQ
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @forelse ($riwayat as $index => $item)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border border-gray-200 dark:border-gray-700">
        <h4 class="text-lg font-semibold mb-4 text-purple-600">Hasil ke-{{ $index + 1 }}</h4>
        
        <ul class="text-sm space-y-2 text-gray-700 dark:text-gray-300">
          <li><strong>Skor ES:</strong> {{ $item->skor_es }} ({{ $item->hasil_es }})</li>
          <li><strong>Skor CP:</strong> {{ $item->skor_cp }} ({{ $item->hasil_cp }})</li>
          <li><strong>Skor H:</strong> {{ $item->skor_h }} ({{ $item->hasil_h }})</li>
          <li><strong>Skor P:</strong> {{ $item->skor_p }} ({{ $item->hasil_p }})</li>
          <li><strong>Skor PRO:</strong> {{ $item->skor_pro }} ({{ $item->hasil_pro }})</li>
          <li><strong>Total Kesulitan:</strong> {{ $item->total_kesulitan }} ({{ $item->hasil_total }})</li>
          <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</li>
        </ul>
      </div>
      @empty
      <div class="col-span-1 md:col-span-2 text-center text-gray-500">
        Belum ada hasil kuesioner yang tersimpan.
      </div>
      @endforelse
    </div>
  </div>
</main>
@endsection
