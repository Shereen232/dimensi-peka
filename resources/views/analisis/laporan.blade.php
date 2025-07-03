@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
      Laporan Hasil Skrining
    </h2>

    @php
      use Carbon\Carbon;
      $currentMonth = request('bulan', Carbon::now()->month);
      $currentYear  = request('tahun', Carbon::now()->year);
    @endphp

    {{-- Form Filter Bulan dan Tahun --}}
    <form method="GET" action="{{ route('analisis.laporan') }}" class="flex flex-wrap items-center justify-center gap-4 mb-6">
      <div>
        <label class="text-sm text-gray-600 dark:text-gray-300">Bulan</label>
        <select name="bulan" class="block w-40 mt-1 form-select dark:bg-gray-700 dark:text-white">
          @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $key => $value)
            <option value="{{ $key + 1 }}" {{ $currentMonth == $key + 1 ? 'selected' : '' }}>{{ $value }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="text-sm text-gray-600 dark:text-gray-300">Tahun</label>
        <select name="tahun" class="block w-32 mt-1 form-select dark:bg-gray-700 dark:text-white">
          @for ($year = 2020; $year <= now()->year; $year++)
            <option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
          @endfor
        </select>
      </div>

      <button type="submit" class="px-4 py-2 mt-6 bg-purple-600 text-white rounded hover:bg-purple-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m4 8V8" />
        </svg>
        Tampilkan
      </button>
    </form>

    {{-- Tombol Preview PDF --}}
    <div class="flex justify-center mb-6">
      <button type="button" onclick="openPreviewModal()" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
        🖨️ Preview & Download PDF
      </button>
    </div>

    {{-- TABEL --}}
    <div class="overflow-auto bg-white dark:bg-gray-800 rounded-lg shadow">
      <table class="w-full text-sm text-center">
        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 uppercase">
          <tr>
            <th class="px-3 py-2">No</th>
            <th class="px-3 py-2">Kelurahan</th>
            <th class="px-3 py-2">Normal</th>
            <th class="px-3 py-2">Borderline</th>
            <th class="px-3 py-2">Abnormal</th>
            <th class="px-3 py-2">Total</th>
          </tr>
        </thead>
        <tbody>
          @php
            $totalNormal = 0;
            $totalBorderline = 0;
            $totalAbnormal = 0;
          @endphp
          @foreach ($data as $index => $row)
            @php
              $totalPerRow = $row['normal'] + $row['borderline'] + $row['abnormal'];
              $totalNormal += $row['normal'];
              $totalBorderline += $row['borderline'];
              $totalAbnormal += $row['abnormal'];
            @endphp
            <tr class="border-t dark:border-gray-700">
              <td class="px-3 py-2">{{ $index + 1 }}</td>
              <td class="px-3 py-2">{{ $row['kelurahan'] }}</td>
              <td class="px-3 py-2">{{ $row['normal'] }}</td>
              <td class="px-3 py-2">{{ $row['borderline'] }}</td>
              <td class="px-3 py-2">{{ $row['abnormal'] }}</td>
              <td class="px-3 py-2">{{ $totalPerRow }}</td>
            </tr>
          @endforeach
          <tr class="font-bold bg-yellow-200 text-black">
            <td colspan="2" class="px-3 py-2 text-right">Total Keseluruhan</td>
            <td class="px-3 py-2">{{ $totalNormal }}</td>
            <td class="px-3 py-2">{{ $totalBorderline }}</td>
            <td class="px-3 py-2">{{ $totalAbnormal }}</td>
            <td class="px-3 py-2">{{ $totalNormal + $totalBorderline + $totalAbnormal }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

{{-- MODAL PREVIEW --}}
<div id="previewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
  <div class="bg-white w-11/12 h-[90vh] p-4 rounded shadow-lg relative">
    <button onclick="closePreviewModal()" class="absolute top-2 right-4 text-xl">✖</button>
    <iframe id="previewFrame" src="" width="100%" height="90%"></iframe>
    <a id="downloadBtn" href="#" class="mt-2 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">⬇️ Download</a>
  </div>
</div>

{{-- SCRIPT --}}
  <script>
    function openPreviewModal() {
      const bulan = '{{ $currentMonth }}';
      const tahun = '{{ $currentYear }}';

      // Sesuaikan dengan route yang ada
      const previewURL = `/analisis/export/preview?bulan=${bulan}&tahun=${tahun}`;
      const downloadURL = `/analisis/export/laporan_pdf?bulan=${bulan}&tahun=${tahun}`;

      document.getElementById('previewFrame').src = previewURL;
      document.getElementById('downloadBtn').href = downloadURL;
      document.getElementById('previewModal').classList.remove('hidden');
    }

    function closePreviewModal() {
      document.getElementById('previewModal').classList.add('hidden');
      document.getElementById('previewFrame').src = ''; // Clear iframe on close
    }
  </script>

@endsection
