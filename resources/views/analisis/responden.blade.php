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
      <div class="w-full overflow-x-auto">
        <table id="hasilTable" class="display w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Sekolah</th>
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
              <td class="px-4 py-3 text-sm">{{ $item->user->name ?? '-' }}</td>
              <td class="px-4 py-3 text-sm">{{ $item->user->sekolah ?? '-' }}</td>
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
              <td colspan="12" class="px-4 py-3 text-center text-gray-500">Belum ada data kuesioner.</td>
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
    $('#hasilTable').DataTable({
      responsive: true,
      pageLength: 10,
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data per halaman",
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data",
        paginate: {
          first: "Pertama",
          last: "Terakhir",
          next: "Berikutnya",
          previous: "Sebelumnya"
        }
      }
    });
  });
</script>
@endpush

@endsection
