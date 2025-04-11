<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dimensi Peka')</title>
  <link href="{{ asset('assets/css/tailwind.output.css') }}" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
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

  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
</body>
</html>
