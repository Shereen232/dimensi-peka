@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container mx-auto px-6 py-6">

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100 mb-8">
      Kuesioner SDQ – Responden
    </h2>

    {{-- Notifikasi jika ada --}}
    @if(session('success'))
      <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- Form --}}
    <form action="#" method="POST">
      @csrf

      <div class="grid grid-cols-1 gap-6">
        @foreach($questions as $index => $q)
        <div class="p-5 border border-gray-200 dark:border-gray-700 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
          <p class="mb-4 font-medium text-gray-800 dark:text-gray-100">
            {{ $index + 1 }}. {{ $q->pertanyaan }}
          </p> 

          <div class="flex flex-col md:flex-row">
            @foreach ($options as $option)
              @if ($option->question_id == $q->id)
              <label class="inline-flex items-center ml-2">
                <input type="radio" name="answers{{ $q->id }}" value="{{$option->id}}" required class="form-radio text-purple-600 focus:ring-purple-500">
                <span class="ml-4 text-gray-700 dark:text-gray-300">{{$option->text}}</span>
              </label>
              @endif
            @endforeach
          </div>
        </div>
        @endforeach
      </div>

      {{-- Tombol Submit --}}
      <div class="mt-10 text-center">
        <button type="submit"
          class="px-8 py-3 text-white bg-purple-600 hover:bg-purple-700 rounded-lg shadow font-medium">
          Kirim Jawaban
        </button>
      </div>
    </form>

  </div>
</main>
@endsection
