<aside
    class="z-20 w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
    :class="{ 'hidden': !isSideMenuOpen, 'block': isSideMenuOpen }"
  >
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
      @if(auth()->user()->role === 'responden')
        <li class="relative px-6 py-3">
          @if (Request::is('kuesioner*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
          @endif
          <a href="{{ url('/kuesioner') }}"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('kuesioner*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
            </svg>
            <span class="ml-4">Tes Skrining</span>
          </a>
        </li>
      @endif

      {{-- Hanya untuk Responden --}}
      @if(auth()->user()->role === 'responden')
        <li class="relative px-6 py-3">
          <a href="{{ route('riwayat.index') }}"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M5 13l4 4L19 7" />
            </svg>
            <span class="ml-4">Riwayat Hasil</span>
          </a>
        </li>
      @endif

      {{-- Hanya untuk Admin --}}
      @if(auth()->user()->role === 'admin')
        {{-- User Management --}}
        <li class="relative px-6 py-3" x-data="{ open: {{ Request::is('user*') || Request::is('detail-user*') ? 'true' : 'false' }} }">
        <button @click="open = !open"
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('user*') || Request::is('detail-user*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 100 7.75"/>
            </svg>
            <span class="ml-4">Master User</span>
          </span>
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.585l3.71-3.41a.75.75 0 111.06 1.06l-4.25 4a.75.75 0 01-1.06 0l-4.25-4a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
          </svg>
        </button>

        <ul x-show="open" x-transition class="mt-2 ml-6 space-y-1 text-sm font-medium text-gray-600 dark:text-gray-400">
          <li>
            <a href="{{ route('user.index') }}" class="block px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('user*') ? 'text-gray-800 dark:text-gray-100' : '' }}">User</a>
          </li>
          <li>
            <a href="{{ url('user/detail-user') }}" class="block px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('detail-user*') ? 'text-gray-800 dark:text-gray-100' : '' }}">Detail User</a>
          </li>
        </ul>
      </li>


        {{-- Data Analysis --}}
         <li class="relative px-6 py-3">
        <a href="{{ route('analisis.responden') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M5 13l4 4L19 7" />
          </svg>
          <span class="ml-4">Hasil Skrining</span>
        </a>
      </li>

        <li class="relative px-6 py-3" x-data="{ open: {{ Request::is('grafik*') ? 'true' : 'false' }} }">
          <button @click="open = !open"
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('grafik*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
            <span class="inline-flex items-center">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
              </svg>
              <span class="ml-4">Data Grafik</span>
            </span>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
          </button>
        <ul x-show="open" x-transition
          class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
          aria-label="submenu">
          <li>
            <a class="block px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('grafik/wilayah*') ? 'text-gray-800 dark:text-gray-100' : '' }}"
              href="{{ url('/grafik/wilayah') }}">
              Data Wilayah
            </a>
          </li>

          <li>
            <a class="block px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('grafik/jenis-kelamin*') ? 'text-gray-800 dark:text-gray-100' : '' }}"
              href="{{ url('/grafik/jenis-kelamin') }}">
              Data Jenis Kelamin
            </a>
          </li>
        </ul>
      </li>

      <li class="relative px-6 py-3">
        <a href="{{ url('analisis/laporan') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9 17v-2h6v2m-6 4h6a2 2 0 002-2v-2a2 2 0 00-2-2H9a2 2 0 00-2 2v2a2 2 0 002 2z"/>
          </svg>
          <span class="ml-4">Laporan</span>
        </a>
      </li>

      <li class="relative px-6 py-3">
          @if (Request::is('history*'))
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
          @endif
          <a href="{{ route('history.index') }}"
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('history*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="ml-4">Histori Aktivitas</span>
          </a>
      </li>

      {{-- ...existing code... --}}

      <li class="relative px-6 py-3">
        <a href="{{ route('pertanyaan.index') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M12 20h9" />
            <path d="M16.5 3.5a2.121 2.121 0 113 3L7 19.5 3 21l1.5-4L16.5 3.5z" />
          </svg>
          <span class="ml-4">Kelola Pertanyaan</span>
        </a>
      </li>

{{-- ...existing code... --}}

     <li class="relative px-6 py-3">
        <a href="{{ url('kelurahan') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M3 7h18M3 12h18M3 17h18"/>
          </svg>
          <span class="ml-4">Kelola Kelurahan</span>
        </a>
      </li>
      
      @endif

      {{-- Akun Saya - Semua role --}}
      <li class="relative px-6 py-3">
        @if (Request::is('akun'))
          <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
        @endif
        <a href="{{ route('akun.index') }}"
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ Request::is('akun*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }} hover:text-gray-800 dark:hover:text-gray-200">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
          </svg>
          <span class="ml-4">Akun Saya</span>
        </a>
      </li>

            {{-- Logout --}}
      <li class="relative px-6 py-3">
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
          @csrf
          <button type="submit"
            onclick="return confirmLogout(event)"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m0-4V9a2 2 0 114 0v1" />
            </svg>
            <span>Logout</span>
          </button>
        </form>
      </li>

    </ul>
  </div>
</aside>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function main() {
    return {
      isSideMenuOpen: false,
      toggleSideMenu() {
        this.isSideMenuOpen = !this.isSideMenuOpen
      }
    }
  }
  function confirmLogout(event) {
    event.preventDefault(); // Jangan langsung kirim form

    Swal.fire({
      title: 'Keluar dari aplikasi?',
      text: "Anda akan keluar dari sesi saat ini.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, Logout',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
      }
    });

    return false;
  }
</script>

