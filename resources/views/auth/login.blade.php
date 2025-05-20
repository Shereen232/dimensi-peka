<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - DIMENSI PEKA</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
</head>
<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img class="object-cover w-full h-full dark:hidden" src="{{ asset('assets/img/login-office.jpeg') }}" alt="Office" />
          <img class="hidden object-cover w-full h-full dark:block" src="{{ asset('assets/img/login-office-dark.jpeg') }}" alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-8 text-xl font-semibold text-gray-700 dark:text-gray-200">Login</h1>

            {{-- Alert Error --}}
            @if ($errors->any())
              <div class="mb-4 text-sm text-red-600">
                {{ $errors->first() }}
              </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
              @csrf

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email atau Username</span>
                <input name="login" type="text" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input"
                  placeholder="Email atau Username" />
              </label>              

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input"
                  placeholder="***************" />
              </label>

              <button type="submit"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none">
                Log in
              </button>

              <div class="mt-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                  Belum punya akun?
                  <a href="{{ route('register') }}" class="text-purple-600 hover:underline dark:text-purple-400">
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
