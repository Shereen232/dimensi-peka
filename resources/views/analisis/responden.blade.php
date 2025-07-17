@extends('layouts.app')

@section('content')

@php
function statusColor($score) {
    if ($score <= 15) return 'green';
    if ($score >= 20) return 'red';
    return 'yellow';
}

function statusText($score) {
    if ($score <= 15) return 'Normal';
    if ($score >= 20) return 'Abnormal';
    return 'Borderline';
}
@endphp

<main class="h-full overflow-y-auto">
  <div class="container mx-auto px-6">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 text-center">
      Biodata & Hasil Kuesioner Responden
    </h2>

    <br>
    <br>
    

  <form method="GET" class="flex flex-wrap items-center gap-4 mb-6">

    <div>
      <label for="puskesmas" class="block text-sm text-gray-600 dark:text-gray-400">Kelurahan</label>
      <select name="puskesmas" id="puskesmas" class="form-select dark:bg-gray-700">
        <option value="">-- Semua --</option>
        @foreach($kelurahanList as $k)
          <option value="{{ $k }}" {{ request('puskesmas') == $k ? 'selected' : '' }}>{{ $k }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="bulan" class="block text-sm text-gray-600 dark:text-gray-400">Bulan</label>
      <select name="bulan" id="bulan" class="form-select dark:bg-gray-700">
        @for($m = 1; $m <= 12; $m++)
          <option value="{{ $m }}" {{ $bulan == $m ? 'selected' : '' }}>
              {{ \Carbon\Carbon::create()->month($m)->locale('id')->translatedFormat('F') }}
          </option>
        @endfor
      </select>
    </div>

    <div>
      <label for="tahun" class="block text-sm text-gray-600 dark:text-gray-400">Tahun</label>
      <select name="tahun" id="tahun" class="form-select dark:bg-gray-700">
        @for($t = date('Y'); $t >= 2020; $t--)
          <option value="{{ $t }}" {{ $tahun == $t ? 'selected' : '' }}>{{ $t }}</option>
        @endfor
      </select>
    </div>

    <div class="mt-6">
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
    </div>

  </form>


  <!-- Tombol Ekspor Excel -->
    <div class="flex justify-end mb-4">
      <a href="{{ route('analisis.export.excel', request()->only('puskesmas', 'bulan', 'tahun')) }}" target="_blank"
        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 transition">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16h16M4 4l16 16"></path>
        </svg>
        Ekspor Excel
      </a>
    </div>

  {{-- Tombol Ekspor PDF --}}
  {{-- Uncomment if you want to enable PDF export --}}



  {{-- <div class="flex justify-end mb-4">
    <a href="{{ route('analisis.export.pdf', request()->only('puskesmas', 'bulan', 'tahun')) }}"
      class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
      Ekspor PDF
    </a>
  </div> --}}



      <div class="w-full overflow-x-auto">
        <table id="hasilTable" class="display w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">NIK</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Kelurahan</th>
              <th class="px-4 py-3">Kelas</th>
              <th class="px-4 py-3">Skor ES</th>
              <th class="px-4 py-3">Skor CP</th>
              <th class="px-4 py-3">Skor H</th>
              <th class="px-4 py-3">Skor P</th>
              <th class="px-4 py-3">Skor Pro</th>
              <th class="px-4 py-3">Total Kesulitan</th>
              <th class="px-4 py-3">Hasil</th>
              <th class="px-4 py-3">Tanggal</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse($riwayat as $index => $item)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->user->nik ?? '-' }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->user->name ?? '-' }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->user->kelurahan ?? '-' }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->user->kelas ?? '-' }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->skor_es }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->skor_cp }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->skor_h }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->skor_p }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->skor_pro }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->total_kesulitan }}</td>
              <td class="px-4 py-3 text-sm capitalize">
                <span class="px-2 py-1 text-xs font-semibold rounded-lg bg-{{ statusColor($item->total_kesulitan) }}-200 text-{{ statusColor($item->total_kesulitan) }}-700">
                  {{ statusText($item->total_kesulitan) }}
                </span>
              </td>
              <td class="px-4 py-3 text-sm">{{ $item->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="13" class="px-4 py-3 text-center text-gray-500">Belum ada data kuesioner.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
  
      </div>
    </div>
  </div>
</main>

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    // Cek apakah DataTable sudah ada, jika iya, hancurkan dulu
    if ($.fn.DataTable.isDataTable('#hasilTable')) {
      $('#hasilTable').DataTable().destroy();
    }

    // Baru inisialisasi ulang
    $('#hasilTable').DataTable(\);
  });
</script>

@endpush

@endsection
