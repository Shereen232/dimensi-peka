<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selamat Datang - DIMENSI PEKA</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-2xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto">
        <div class="flex items-center justify-center p-6 sm:p-12">
          <div class="w-full">
            <!-- Logo and Heading -->
            <div class="bg-white rounded-xl shadow-xl w-full max-w-sm p-6">
              
              <!-- Logo -->
            <div class="flex justify-center gap-4 mb-6">
                <img src="{{ asset('images/logo_kemenkes.jpg') }}" alt="Logo Kemenkes" class="h-12 object-contain" />
                <img src="{{ asset('images/logo_germas.jpg') }}" alt="Logo Germas" class="h-12 object-contain" />
            </div>

              <!-- Heading -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
                <p class="text-sm text-gray-600">Sistem Informasi Kesehatan Jiwa</p>
            </div>
            {{-- Alert Error --}}
            @if ($errors->any())
              <div class="mb-4 p-3 rounded-md bg-red-100 text-red-700 dark:bg-red-700 dark:text-red-100">
                {{ $errors->first() }}
              </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
              @csrf

              <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Email atau Username</span>
                <input name="login" type="text" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                  placeholder="Email atau Username" autocomplete='off' />
              </label>

              <label class="block text-sm mb-6">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                  placeholder="***************" />
              </label>

              <button type="submit"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Log in
              </button>

              <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                  Belum punya akun?
                  <a href="{{ route('register') }}" class="font-medium text-purple-600 hover:underline dark:text-purple-400">
                    Daftar di sini
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
@stack('scripts')
<script src="{{ asset('assets/js/init-alpine.js') }}"></script>
@if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: "{{ session('success') }}",
      position: "top-end",
      showConfirmButton: false,
      timer: 1500
    });
  </script>
@endif