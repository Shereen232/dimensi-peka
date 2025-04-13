@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container mx-auto px-6 py-6">

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100 mb-8">
      Hasil Kuesioner SDQ
    </h2>

    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
      <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Informasi Pengguna</h5>
      <p class="text-gray-700 dark:text-gray-300"><strong>Nama:</strong> Administrator</p>
      <p class="text-gray-700 dark:text-gray-300"><strong>Usia:</strong> 22</p>
      <p class="text-gray-700 dark:text-gray-300"><strong>Tanggal:</strong> {{ date('Y-m-d') }}</p>
  </div>
  
  <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
    <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 text-center">Tabel Kuisioner SDQ</h5>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm text-left">
          <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
              <th class="px-4 py-2 text-gray-700 dark:text-gray-200 font-semibold">Kategori</th>
              <th class="px-4 py-2 text-gray-700 dark:text-gray-200 font-semibold">Skor</th>
              <th class="px-4 py-2 text-gray-700 dark:text-gray-200 font-semibold">Type</th>
              <th class="px-4 py-2 text-gray-700 dark:text-gray-200 font-semibold">Result</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-300">
            <tr>
              <td class="px-4 py-2">Emotional Symptoms (ES)</td>
              <td class="px-4 py-2"><strong id="E"></strong></td>
              <td class="px-4 py-2"><strong>Gangguan</strong></td>
              <td class="px-4 py-2"><strong>Normal</strong></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Conduct Problems (CP)</td>
              <td class="px-4 py-2"><strong id="C"></strong></td>
              <td class="px-4 py-2"><strong>Gangguan</strong></td>
              <td class="px-4 py-2"><strong>Normal</strong></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Hyperactivity (H)</td>
              <td class="px-4 py-2"><strong id="H"></strong></td>
              <td class="px-4 py-2"><strong>Gangguan</strong></td>
              <td class="px-4 py-2"><strong>Normal</strong></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Peer Problems (P)</td>
              <td class="px-4 py-2"><strong id="P"></strong></td>
              <td class="px-4 py-2"><strong>Gangguan</strong></td>
              <td class="px-4 py-2"><strong>Normal</strong></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Prosocial Behavior (Pro)</td>
              <td class="px-4 py-2"><strong id="Pro"></strong></td>
              <td class="px-4 py-2"><strong>Skor Total Kekuatan</strong></td>
              <td class="px-4 py-2"><strong>Normal</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm text-left">
          <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
              <th class="px-4 py-2 text-gray-700 dark:text-gray-200 font-semibold">Skor Total Kesulitan</th>
              <th class="px-4 py-2 text-gray-700 dark:text-gray-200 font-semibold">Result</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-300">
            <tr>
              <th class="px-4 py-2" id="total-score"></td>
              <td class="px-4 py-2"><strong>Borderline</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  @php
      $score = [
        'Pro' => 0,
        'E' => 0,
        'C' => 0,
        'H' => 0,
        'P' => 0,
      ];
  @endphp
  
  <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
      <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Rekapan Jawaban</h5>
        @foreach($questions as $index => $q)
        <div class="mb-4">
          <p class="mb-4 font-medium text-gray-800 dark:text-gray-100">
            {{ $index + 1 }}. {{ $q->pertanyaan }}
          </p> 

          <div class="flex flex-col md:flex-row">
            @foreach ($options as $option)
              @if ($option->question_id == $q->id)
              <label class="inline-flex items-center ml-2">
                <input type="radio" name="answers{{ $q->id }}" value="{{$option->id}}" required class="form-radio text-purple-600 focus:ring-purple-500" @php
                    if($option->id == $answers[$q->id]){
                      echo 'checked';
                      if (isset($score[$q->kategori])) {
                          $score[$q->kategori] += $option->score;
                      }
                    }
                @endphp disabled>
                <span class="ml-4 text-gray-700 dark:text-gray-300">{{$option->text}}</span>
              </label>
              @endif
            @endforeach
          </div>
        <b>Score: {{ \App\Models\Option::find($answers[$q->id])->score }}</b>
        </div>
        @endforeach
      </div>
      <a href="{{ route('kuesioner.index') }}" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</main>
<script>
  const score = @json($score);
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Memasukkan skor ke elemen HTML
      document.querySelector('#Pro').textContent = score.Pro;
      document.querySelector('#E').textContent = score.E;
      document.querySelector('#C').textContent = score.C;
      document.querySelector('#H').textContent = score.H;
      document.querySelector('#P').textContent = score.P;
      document.querySelector('#total-score').textContent = score.E+score.C+score.H+score.P;
  });
</script>

@endsection
