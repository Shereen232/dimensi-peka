@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100 mb-8">
      Akun Saya
    </h2>

    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow p-6">
      {{-- Input: Nama --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Nama</span>
        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
          <input
            class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            value="yaya" readonly />
          <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M5.121 17.804A9.996 9.996 0 0112 2a9.996 9.996 0 016.879 15.804M15 21h-6v-1a2 2 0 012-2h2a2 2 0 012 2v1z"/>
            </svg>
          </div>
        </div>
      </label>

      {{-- Input: Email --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
          <input
            class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            value="ggemail" readonly />
          <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M16 12H8m0 0l4-4m-4 4l4 4" />
            </svg>
          </div>
        </div>
      </label>

      {{-- Input: Umur --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Umur</span>
        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
          <input
            class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            value="ggumur" readonly />
          <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2s-3 1.343-3 3 1.343 3 3 3zm0 2c-2.761 0-5 2.239-5 5v4h10v-4c0-2.761-2.239-5-5-5z"/>
            </svg>
          </div>
        </div>
      </label>

      {{-- Input: Alamat --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
        <textarea
          class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-textarea"
          rows="2"
          readonly>ggalamat</textarea>
      </label>

      {{-- Input: Kelas --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Kelas</span>
        <input
          class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
          value="ggkelas" readonly />
      </label>

      {{-- Input: Sekolah --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Sekolah</span>
        <input
          class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
          value="ggsekolah" readonly />
      </label>

      {{-- Input: Role --}}
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Role</span>
        <input
          class="block w-full mt-1 text-sm text-purple-600 dark:text-purple-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input capitalize"
          value="ggrole" readonly />
      </label>
    </div>
  </div>
</main>
@endsection
