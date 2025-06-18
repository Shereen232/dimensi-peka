@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto px-6 py-8">
  <div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      {{-- DATA ANAK --}}
      <div class="bg-white dark:bg-gray-800 rounded shadow p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-purple-700 mb-4">📌 Data Anak</h3>
        <ul class="text-gray-700 dark:text-gray-300 text-sm space-y-2">
          <li><strong>ID Anak:</strong> {{ $user->id }}</li>
          <li><strong>Nama:</strong> {{ $user->name }}</li>
          <li><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin ?? '-' }}</li>
          <li><strong>Umur:</strong> {{ $user->umur }} tahun</li>
          <li><strong>Skrining pada:</strong> {{ $riwayat->tanggal }}</li>
          <li class="pt-4">
          <p class="font-semibold text-sm text-gray-800 dark:text-gray-300 mb-2">Basis Pengetahuan Penilaian Hasil Skrining</p>

          {{-- 1. Skor Total Kesulitan --}}
          <p class="mb-1 text-xs font-semibold">1. Skor Total Kesulitan</p>
          <table class="table-auto border border-gray-300 mb-4 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-700">
              <tr>
                <th class="border px-3 py-1">Skor</th>
                <th class="border px-3 py-1">Kategori</th>
              </tr>
            </thead>
            <tbody>
              <tr><td class="border px-3 py-1">0 – 15</td><td class="border px-3 py-1">Normal</td></tr>
              <tr><td class="border px-3 py-1">16 – 19</td><td class="border px-3 py-1">Borderline</td></tr>
              <tr><td class="border px-3 py-1">20 – 40</td><td class="border px-3 py-1">Abnormal</td></tr>
            </tbody>
          </table>

          {{-- 2. Skor Gejala Emosional (E) --}}
          <p class="mb-1 text-xs font-semibold">2. Skor Gejala Emosional (E)</p>
          <table class="table-auto border border-gray-300 mb-4 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-700">
              <tr><th class="border px-3 py-1">Skor</th><th class="border px-3 py-1">Kategori</th></tr>
            </thead>
            <tbody>
              <tr><td class="border px-3 py-1">0 – 5</td><td class="border px-3 py-1">Normal</td></tr>
              <tr><td class="border px-3 py-1">6</td><td class="border px-3 py-1">Borderline</td></tr>
              <tr><td class="border px-3 py-1">7 – 10</td><td class="border px-3 py-1">Abnormal</td></tr>
            </tbody>
          </table>

          {{-- 3. Skor Masalah Perilaku (C) --}}
          <p class="mb-1 text-xs font-semibold">3. Skor Masalah Perilaku (C)</p>
          <table class="table-auto border border-gray-300 mb-4 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-700">
              <tr><th class="border px-3 py-1">Skor</th><th class="border px-3 py-1">Kategori</th></tr>
            </thead>
            <tbody>
              <tr><td class="border px-3 py-1">0 – 3</td><td class="border px-3 py-1">Normal</td></tr>
              <tr><td class="border px-3 py-1">4 – 9</td><td class="border px-3 py-1">Borderline</td></tr>
              <tr><td class="border px-3 py-1">10 – 10+</td><td class="border px-3 py-1">Abnormal</td></tr>
            </tbody>
          </table>

          {{-- 4. Skor Hiperaktivitas (H) --}}
          <p class="mb-1 text-xs font-semibold">4. Skor Hiperaktivitas (H)</p>
          <table class="table-auto border border-gray-300 mb-4 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-700">
              <tr><th class="border px-3 py-1">Skor</th><th class="border px-3 py-1">Kategori</th></tr>
            </thead>
            <tbody>
              <tr><td class="border px-3 py-1">0 – 5</td><td class="border px-3 py-1">Normal</td></tr>
              <tr><td class="border px-3 py-1">6</td><td class="border px-3 py-1">Borderline</td></tr>
              <tr><td class="border px-3 py-1">7 – 10+</td><td class="border px-3 py-1">Abnormal</td></tr>
            </tbody>
          </table>

          {{-- 5. Skor Masalah Teman Sebaya (P) --}}
          <p class="mb-1 text-xs font-semibold">5. Skor Masalah Teman Sebaya (P)</p>
          <table class="table-auto border border-gray-300 mb-4 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-700">
              <tr><th class="border px-3 py-1">Skor</th><th class="border px-3 py-1">Kategori</th></tr>
            </thead>
            <tbody>
              <tr><td class="border px-3 py-1">0 – 3</td><td class="border px-3 py-1">Normal</td></tr>
              <tr><td class="border px-3 py-1">4 – 5</td><td class="border px-3 py-1">Borderline</td></tr>
              <tr><td class="border px-3 py-1">6 – 10+</td><td class="border px-3 py-1">Abnormal</td></tr>
            </tbody>
          </table>

          {{-- 6. Skor Perilaku Prososial (Pro) --}}
          <p class="mb-1 text-xs font-semibold">6. Skor Perilaku Prososial (Pro)</p>
          <table class="table-auto border border-gray-300 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-700">
              <tr><th class="border px-3 py-1">Skor</th><th class="border px-3 py-1">Kategori</th></tr>
            </thead>
            <tbody>
              <tr><td class="border px-3 py-1">0 – 4</td><td class="border px-3 py-1">Abnormal</td></tr>
              <tr><td class="border px-3 py-1">5</td><td class="border px-3 py-1">Borderline</td></tr>
              <tr><td class="border px-3 py-1">6 – 10</td><td class="border px-3 py-1">Normal</td></tr>
            </tbody>
          </table>
        </li>
</div>

      {{-- HASIL SKRINING --}}
      <div class="bg-white dark:bg-gray-800 rounded shadow p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-purple-700 mb-4">📄 Hasil Skrining Mental Emosional</h3>
        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
          Sesuai teori Strength and Difficulties Questionnaire, terdapat dua sub skala kesehatan mental emosional anak yaitu <strong>Kekuatan dan Kesulitan Anak</strong>. Berikut hasil skrining dan interpretasinya.
        </p>

        {{-- Total Kesulitan --}}
        <table class="min-w-full text-sm mb-6">
          <tr>
            <td class="font-semibold w-1/3">Total Kesulitan Anak</td>
            <td>: {{ $riwayat->hasil_total }} (Skor: {{ $riwayat->total_kesulitan }})</td>

          </tr>
          <tr>
            <td class="font-semibold">Keterangan</td>
            <td>: <span id="Total-ket"></span></td>
          </tr>
          <tr>
            <td class="font-semibold">Rekomendasi</td>
            <td>: <span id="Total-rekom"></span></td>
          </tr>
        </table>

        {{-- Detail Per Kategori --}}
        <h4 class="text-md font-semibold text-gray-700 dark:text-gray-200 mb-2">Detail Kesulitan Anak:</h4>

    @php
      $map = ['E' => 'es', 'C' => 'cp', 'H' => 'h', 'P' => 'p', 'Pro' => 'pro'];
    @endphp

    @foreach (['E' => 'Gejala Emosional', 'C' => 'Masalah Perilaku', 'H' => 'Hiperaktivitas', 'P' => 'Masalah Teman Sebaya', 'Pro' => 'Perilaku Prososial'] as $kode => $label)
    @php
      $kolom = 'hasil_' . $map[$kode];
    @endphp
    <table class="min-w-full text-sm mb-6">
      <tr class="text-purple-700 font-semibold">
        <td class="w-1/3">{{ $label }} ({{ $kode }})</td>
        <td>: {{ $riwayat->$kolom }}(Skor: {{ $score[$kode] ?? '-' }})</td>
      </tr>
      <tr>
        <td class="font-semibold">Keterangan</td>
        <td>: <span id="{{ $kode }}-ket"></span></td>
      </tr>
      <tr>
        <td class="font-semibold">Rekomendasi</td>
        <td>: <span id="{{ $kode }}-rekom"></span></td>
      </tr>
    </table>
    @endforeach

      </div>
    </div>
  </div>
   
  <div class="flex justify-center flex-wrap gap-4 mt-6">
    <!-- Tombol Kembali -->
    <a href="{{ route('kuesioner.index') }}"
      class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 transition">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
      </svg>
      Kembali
    </a>

    <!-- Tombol Ekspor PDF -->
    {{-- <a href="{{ route('kuesioner.export.pdf', ['id' => $user->id]) }}" target="_blank"
      class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
      </svg>
      Ekspor PDF
    </a> --}}

    <!-- Tombol Isi Ulang -->
    <form method="POST" action="{{ route('kuesioner.reset') }}">
      @csrf
      <button type="submit" onclick="return confirm('Yakin ingin mengisi ulang kuesioner?')"
        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 4.5l15 15M19.5 4.5l-15 15"></path>
        </svg>
        Isi Ulang
      </button>
    </form>
  </div>

</main>

{{-- Kirim data skor ke JS --}}
<script>
  const score = @json($score);

  function getResult(category, value) {
  if (category === 'E') return value <= 5 ? 'NORMAL' : value >= 7 ? 'ABNORMAL' : 'BORDERLINE';
  if (category === 'C') return value <= 3 ? 'NORMAL' : value >= 10 ? 'ABNORMAL' : 'BORDERLINE';
  if (category === 'H') return value <= 5 ? 'NORMAL' : value >= 7 ? 'ABNORMAL' : 'BORDERLINE';
  if (category === 'P') return value <= 3 ? 'NORMAL' : value >= 6 ? 'ABNORMAL' : 'BORDERLINE';
  if (category === 'Pro') return value >= 6 ? 'NORMAL' : value <= 4 ? 'ABNORMAL' : 'BORDERLINE';
  if (category === 'Total') return value <= 15 ? 'NORMAL' : value >= 20 ? 'ABNORMAL' : 'BORDERLINE';
  return '-';
}

  function getExplanation(category, status) {
    const penjelasan = {
      Total: {
        NORMAL: {
          ket: 'Normal pada total kesulitan berarti anak belajar dengan baik, tidak memiliki gangguan yang berarti, baik berasal dari faktor internal anak maupun eksternalnya.',
          rekom: '-',
        },
        BORDERLINE: {
          ket: 'Terdapat beberapa tanda potensi masalah psikososial, meskipun belum tergolong sebagai gangguan yang pasti.',
          rekom: 'Lakukan skrining ulang dalam 3–6 bulan. Bila ada perubahan signifikan, konsultasikan ke psikolog anak atau psikiater.',
        },
        ABNORMAL: {
          ket: 'Ada indikasi kuat masalah psikososial yang membutuhkan perhatian lebih lanjut.',
          rekom: 'Segera konsultasi dengan psikolog anak atau psikiater.',
        },
      },
      E: {
        NORMAL: {
          ket: 'Anak mampu mengendalikan perasaan dan pikirannya secara emosional.',
          rekom: '-',
        },
        BORDERLINE: {
          ket: 'Terdapat tanda awal kesulitan emosional, seperti cemas, sedih, atau takut berlebihan.',
          rekom: 'Perhatikan perubahan suasana hati, mudah menangis, sulit tidur, atau menghindari aktivitas sosial.',
        },
        ABNORMAL: {
          ket: 'Mengalami kesulitan emosional yang signifikan seperti cemas berlebihan, sering merasa sedih atau takut.',
          rekom: 'Segera konsultasikan dengan psikolog anak atau psikiater.',
        },
      },
      C: {
        NORMAL: {
          ket: 'Tidak ada tanda-tanda perilaku bermasalah yang signifikan.',
          rekom: '-',
        },
        BORDERLINE: {
          ket: 'Indikasi awal kesulitan perilaku seperti mudah marah atau membangkang.',
          rekom: 'Observasi lebih lanjut terhadap perilaku di rumah dan sekolah.',
        },
        ABNORMAL: {
          ket: 'Menunjukkan perilaku bermasalah signifikan seperti agresif, kasar, atau suka mencuri.',
          rekom: 'Segera konsultasikan dengan psikolog anak.',
        },
      },
      H: {
        NORMAL: {
          ket: 'Tidak menunjukkan gangguan perhatian atau hiperaktivitas yang berarti.',
          rekom: '-',
        },
        BORDERLINE: {
          ket: 'Tanda-tanda gangguan perhatian atau impulsivitas mulai terlihat.',
          rekom: 'Perlu pemantauan lebih lanjut.',
        },
        ABNORMAL: {
          ket: 'Mengalami gangguan perhatian dan hiperaktivitas yang nyata.',
          rekom: 'Segera konsultasikan dengan psikolog atau psikiater.',
        },
      },
      P: {
        NORMAL: {
          ket: 'Relasi sosial anak tergolong baik.',
          rekom: '-',
        },
        BORDERLINE: {
          ket: 'Mulai terlihat kesulitan dalam hubungan sosial.',
          rekom: 'Dorong anak untuk aktif di kegiatan sosial.',
        },
        ABNORMAL: {
          ket: 'Kesulitan sosial yang signifikan.',
          rekom: 'Konsultasikan dengan psikolog atau konselor sekolah.',
        },
      },
      Pro: {
        NORMAL: {
          ket: 'Kemampuan sosial anak baik.',
          rekom: '-',
        },
        BORDERLINE: {
          ket: 'Kemungkinan keterbatasan empati atau kerja sama.',
          rekom: 'Berikan teladan dan bimbingan sosial secara langsung.',
        },
        ABNORMAL: {
          ket: 'Kurangnya kepedulian terhadap orang lain.',
          rekom: 'Segera konsultasikan dengan psikolog atau konselor sekolah.',
        },
      },
    };

    return penjelasan[category]?.[status] || { ket: '-', rekom: '-' };
  }

  document.addEventListener('DOMContentLoaded', function () {
  const resultMap = {
    E: score.skor_es,
    C: score.skor_cp,
    H: score.skor_h,
    P: score.skor_p,
    Pro: score.skor_pro,
    Total: score.skor_es + score.skor_cp + score.skor_h + score.skor_p,
  };

  for (const kategori in score) {
  const totalScore = score.es + score.cp + score.h + score.p;
  const totalStatus = getResult('Total', totalScore);
  const { ket: totalKet, rekom: totalRekom } = getExplanation('Total', totalStatus);

  const totalKetEl = document.querySelector('#Total-ket');
  const totalRekomEl = document.querySelector('#Total-rekom');

  if (totalKetEl) totalKetEl.textContent = totalKet;
  if (totalRekomEl) totalRekomEl.textContent = totalRekom;

  const val = score[kategori];
  const status = getResult(kategori, val);
  const { ket, rekom } = getExplanation(kategori, status);

  const skorEl   = document.querySelector(`#${kategori}`);
  const hasilEl  = document.querySelector(`#${kategori}-result`);
  const ketEl    = document.querySelector(`#${kategori}-ket`);
  const rekomEl  = document.querySelector(`#${kategori}-rekom`);

  if (skorEl) skorEl.textContent = val;
  if (hasilEl) hasilEl.textContent = status;
  if (ketEl) ketEl.textContent = ket;
  if (rekomEl) rekomEl.textContent = rekom;
}

});

</script>



@endsection

