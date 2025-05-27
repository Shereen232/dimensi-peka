<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dimensi Peka')</title>
  <link href="{{ asset('assets/css/tailwind.output.css') }}" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@stack('scripts')   

  @stack('styles')
</head>
<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <div class="flex flex-col flex-1 w-full">
      <!-- Header -->
      @include('layouts.header')

      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          @yield('content')
        </div>
      </main>
    </div>
  </div>
  @stack('scripts')
  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
  @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
    </script>
  @endif
  
</body>
</html>
