<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
  <div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">DIMENSI PEKA</a>
    
    <ul class="mt-6">
      {{-- Dashboard --}}
      <li class="relative px-6 py-3">
        @if (Request::is('dashboard'))
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        @endif
        <a href="{{ url('/dashboard') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('dashboard') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
    </ul>

    <ul>
      {{-- kuesioner --}}
      <li class="relative px-6 py-3">
        @if (Request::is('kuesioner*'))
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        @endif
        <a href="{{ url('/kuesioner') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('kuesioner*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
          </svg>
          <span class="ml-4">kuesioner</span>
        </a>
      </li>

      {{-- User --}}
      <li class="relative px-6 py-3">
        @if (Request::is('user*'))
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        @endif
        <a href="{{ route('user.index') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('user*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2"/>
          </svg>
          <span class="ml-4">User</span>
        </a>
      </li>

      {{-- Data Analysis --}}
      <li class="relative px-6 py-3" x-data="{ open: {{ Request::is('grafik*') || Request::is('laporan*') ? 'true' : 'false' }} }">
        <button @click="open = !open"
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('grafik*') || Request::is('laporan*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
              <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
            </svg>
            <span class="ml-4">Data Analysis</span>
          </span>
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
          </svg>
        </button>
        <ul x-show="open" x-transition
          class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
          aria-label="submenu">
          <li>
            <a class="block px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('grafik*') ? 'text-gray-800 dark:text-gray-100' : '' }}" href="{{ url('/grafik') }}">Grafik Hasil</a>
          </li>
          <li>
            <a class="block px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('laporan*') ? 'text-gray-800 dark:text-gray-100' : '' }}" href="{{ url('/laporan') }}">Laporan</a>
          </li>
        </ul>
      </li>

      {{-- akun_saya --}}
      <li class="relative px-6 py-3">
        @if (Request::is('akun_saya*'))
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        @endif
        <a href="{{ url('/akun_saya') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('akun_saya*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
          </svg>
          <span class="ml-4">akun saya</span>
        </a>
      </li>
    </ul>

   
  </div>
</aside>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
