@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container mx-auto px-6 py-8">

    
    <br>
    {{-- Judul --}}
    <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100 mb-10">
      Kuesioner SDQ – Responden
    </h2>
    <br>
    {{-- Notifikasi --}}
    @if(session('success'))
      <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- Form --}}
    <form id="form-quiz" method="POST">
      @csrf

      <div class="grid grid-cols-1 gap-6">
        @foreach($questions as $index => $q)
        <div class="p-6 border rounded-lg shadow-sm bg-white dark:bg-gray-800 dark:border-gray-700">
          <div class="flex items-start mb-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center font-bold text-sm">
              {{ $index + 1 }}
            </div>
            <p class="ml-4 text-gray-800 dark:text-gray-100 font-medium">
              {{ $q->pertanyaan }}
            </p>
          </div>

          <div class="space-y-2 md:space-y-0 md:space-x-4 md:flex">
            @foreach ($options as $option)
              @if ($option->question_id == $q->id)
              <label class="inline-flex items-center">
                <input type="radio" name="answers{{ $q->id }}" value="{{ $option->id }}" required
                  class="form-radio text-purple-600 focus:ring-purple-500">
                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $option->text }}</span>
              </label>
              @endif
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
      <br>
      
      {{-- Submit Button --}}
      <div class="mt-10 text-center">
        <button type="submit"
          class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-purple-400">
          Kirim Jawaban
        </button>
      </div>
    </form>

  </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#form-quiz').submit(function(event) {
      event.preventDefault();
      var formData = new FormData(this);
      var url = "{{ route('kuesioner.store') }}";

      Swal.fire({
        title: "Kirim Kuisioner?",
        text: "Haraop periksa kembali sebelum mengirim!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Kirim!"
      }).then((result) => {
        if (result.isConfirmed) kirim(url, formData);
      });
    });
  });

  function kirim(url, data)
  {
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
          Swal.fire({
            title: "Berhasil!",
            text: "Terimakasih, jawaban anda telah kami rekam.",
            icon: "success"
          });
          console.log(data);
          window.location.reload();
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
  }
</script>
@endsection
