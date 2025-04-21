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

    <form method="GET" action="{{ url()->current() }}" class="mb-4 flex flex-col md:flex-row items-center gap-4">
        <div>
          <label class="block text-sm mb-1 text-gray-600 dark:text-gray-300">Sekolah</label>
          <select name="sekolah" class="form-select w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
            <option value="">Semua</option>
            @foreach($sekolahList as $s)
              <option value="{{ $s }}" {{ request('sekolah') == $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
          </select>
        </div>
      
        <div>
          <label class="block text-sm mb-1 text-gray-600 dark:text-gray-300">Kelas</label>
          <select name="kelas" class="form-select w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
            <option value="">Semua</option>
            @foreach($kelasList as $k)
              <option value="{{ $k }}" {{ request('kelas') == $k ? 'selected' : '' }}>{{ $k }}</option>
            @endforeach
          </select>
        </div>
      
        <div class="pt-6">
          <button type="submit"
            class="px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded hover:bg-purple-700">
            Filter
          </button>
        </div>
      </form>
      
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
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
@endsection
