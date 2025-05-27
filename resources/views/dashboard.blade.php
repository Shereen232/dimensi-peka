@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


@section('title', 'Dashboard')

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>

@if(auth()->user()->role === 'admin')
  <!-- DASHBOARD UNTUK ADMIN -->
  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Total User -->
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
      <div class="flex items-center">
        <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-3-3h-4M9 20H4v-2a3 3 0 013-3h4m1-6a4 4 0 110-8 4 4 0 010 8zm6 4a4 4 0 100-8 4 4 0 000 8z" />
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Pengguna</p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalUser }}</p>
        </div>
      </div>
    </div>

    <!-- Total Responden -->
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
      <div class="flex items-center">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A4 4 0 017 16h10a4 4 0 011.879.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Responden</p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalResponden }}</p>
        </div>
      </div>
    </div>

    <!-- Total Admin -->
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
      <div class="flex items-center">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M20 21v-2a4 4 0 00-3-3.87M4 21v-2a4 4 0 013-3.87M12 11a4 4 0 100-8 4 4 0 000 8z" />
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Admin</p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalAdmin }}</p>
        </div>
      </div>
    </div>

    <!-- Total Kuesioner -->
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
      <div class="flex items-center">
        <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 17l4-4-4-4m8 8V9a4 4 0 00-4-4H6" />
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Kuesioner</p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalKuesioner }}</p>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- DASHBOARD UNTUK RESPONDEN -->
@if(auth()->user()->role === 'responden')
    {{-- ===== Carousel Alpine.js ===== --}}
    <div x-data="carousel" x-init="init()" class="relative w-full max-w-5xl mx-auto mb-10 rounded-lg overflow-hidden shadow-lg">
      {{-- slides --}}
      <div class="relative h-64 md:h-80">
        <template x-for="(slide, index) in slides" :key="index">
          <div x-show="activeSlide === index"
               x-transition:enter="transition ease-out duration-500"
               x-transition:enter-start="opacity-0 scale-95"
               x-transition:enter-end="opacity-100 scale-100"
               class="absolute inset-0">
            <img :src="slide.image" :alt="slide.alt" class="w-full h-full object-cover" />
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-4 text-sm">
              <span x-text="slide.alt"></span>
            </div>
          </div>
        </template>
      </div>
      {{-- bullets --}}
      <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
          <button @click="activeSlide = index"
                  :class="activeSlide === index ? 'bg-white' : 'bg-gray-400'"
                  class="w-3 h-3 rounded-full"></button>
        </template>
      </div>
    </div>

    {{-- ===== Sambutan & Kartu Informasi ===== --}}
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
      Selamat Datang di Dimensi Peka 👋
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
      {{-- Kartu 1 --}}
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 hover:scale-[1.02] transition">
        <div class="flex items-start space-x-4">
          <div class="p-3 bg-blue-100 text-blue-700 rounded-full">
            <i class="fas fa-info-circle text-xl"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Apa itu Dimensi Peka?</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
              Alat untuk memahami keseimbangan emosional dan sosial remaja melalui lima aspek psikologis.
            </p>
          </div>
        </div>
      </div>

      {{-- Kartu 2 --}}
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 hover:scale-[1.02] transition">
        <div class="flex items-start space-x-4">
          <div class="p-3 bg-purple-100 text-purple-700 rounded-full">
            <i class="fas fa-bullseye text-xl"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Tujuan Pengisian</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
              Mendeteksi kekuatan dan kesulitan kamu agar bisa mendapat bimbingan yang tepat.
            </p>
          </div>
        </div>
      </div>

      {{-- Kartu 3 --}}
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 hover:scale-[1.02] transition">
        <div class="flex items-start space-x-4">
          <div class="p-3 bg-green-100 text-green-700 rounded-full">
            <i class="fas fa-check-circle text-xl"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Apa yang Bisa Saya Lakukan?</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
              Setelah mengisi kuesioner, kamu bisa melihat hasil dan berdiskusi dengan guru, orang tua, atau konselor.
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- CTA --}}
    <div class="mt-8 text-center">
      <a href="{{ route('kuesioner.index') }}"
         class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-black rounded-xl shadow hover:bg-blue-700 transition">
        <i class="bg-white-600 hover:bg-white-700 text-black font-semibold py-2 px-4 rounded shadow-md transition "></i> Isi Kuesioner Sekarang
      </a>
    </div>
  @endif
@endsection

{{-- ========== Alpine Component for Carousel ========== --}}
@push('scripts')
<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', () => ({
      activeSlide: 0,
      slides: [
        { image: '/images/dimensi1.png', alt: 'Apa itu Dimensi Peka?' },
        { image: '/images/dimensi2.png', alt: 'Tujuan Pengisian Kuesioner' },
        { image: '/images/dimensi3.png', alt: 'Manfaat Analisis Hasil' }
      ],
      init() {
        // Auto slide
        setInterval(() => {
          this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        }, 5000);
      }
    }))
  })
</script>
@endpush
