@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100 mb-8">
      Akun Saya
    </h2>
    @if(session('success'))
    <div class="mb-4 p-4 text-sm text-green-800 bg-green-200 rounded">
      {{ session('success') }}
    </div>
  @endif
  
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow p-6">
      <form method="POST" action="{{ route('akun.update') }}">
        @csrf
        @method('PUT')

        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">Nama</span>
          <input name="name"
            class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
            value="{{ auth()->user()->name }}" />
        </label>

        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">Email</span>
          <input name="email"
            class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
            value="{{ auth()->user()->email }}" />
        </label>

        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">Password (kosongkan jika tidak ingin diganti)</span>
          <input name="password" type="password"
            class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
            placeholder="***************" />
        </label>

        @if(auth()->user()->role == 'responden')
          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">NIK</span>
            <input name="nik" maxlength="16" class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
              value="{{ auth()->user()->nik }}" />
          </label>

          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Umur</span>
            <input name="umur" class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
              value="{{ auth()->user()->umur }}" />
          </label>

          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Kelurahan</span>
            <select name="kelurahan"
              class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-select">
              <option value="" disabled selected>Pilih kelurahan</option>
              @foreach(['Bendan', 'Kramatsati', 'Tirto', 'Medono', 'Sokorejo', 'Noyontaan', 'Tondano', 'Klego', 'Pekalongan Selatan', 'Jenggot', 'Buaran', 'Kusuma Bangsa', 'Krapyak Kidul', 'Dukuh'] as $kel)
                <option value="{{ $kel }}" {{ auth()->user()->kelurahan == $kel ? 'selected' : '' }}>{{ $kel }}</option>
              @endforeach
            </select>
          </label>

          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Alamat</span>
            <textarea name="alamat" class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-textarea" rows="2">{{ auth()->user()->alamat }}</textarea>
          </label>

          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Jenis Kelamin</span>
            <select name="jenis_kelamin"
              class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-select">
              <option value="L" {{ auth()->user()->jenis_kelamin == 'L' ? 'selected' : '' }}>L (Laki-laki)</option>
              <option value="P" {{ auth()->user()->jenis_kelamin == 'P' ? 'selected' : '' }}>P (Perempuan)</option>
            </select>
          </label>

          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Kelas</span>
            <input name="kelas" class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
              value="{{ auth()->user()->kelas }}" />
          </label>

          <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Sekolah</span>
            <input name="sekolah" class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-input"
              value="{{ auth()->user()->sekolah }}" />
          </label>
        @endif

        <div class="mt-6 text-right">
          <button type="submit"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
@endsection
