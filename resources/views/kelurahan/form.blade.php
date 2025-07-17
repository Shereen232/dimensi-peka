@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
      {{ isset($kelurahan) ? 'Edit Kelurahan' : 'Tambah Kelurahan' }}
    </h2>

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
      <form method="POST" action="{{ isset($kelurahan) ? route('kelurahan.update', $kelurahan->id) : route('kelurahan.store') }}">
        @csrf
        @if(isset($kelurahan))
          @method('PUT')
        @endif

        <div class="mb-4">
          <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Kelurahan</label>
          <input type="text" name="nama" id="nama"
                 value="{{ old('nama', $kelurahan->nama ?? '') }}"
                 class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-600"
                 required>
          @error('nama')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex justify-end gap-3">
          <a href="{{ route('kelurahan.index') }}"
             class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Kembali
          </a>
          <button type="submit"
                  class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
            💾 {{ isset($kelurahan) ? 'Update' : 'Simpan' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
@endsection
