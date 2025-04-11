@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
  </h2>

  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Contoh card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L15 12.75 9.75 8.5"></path>
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Data Penilaian</p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">123</p>
      </div>
    </div>
  </div>
@endsection
