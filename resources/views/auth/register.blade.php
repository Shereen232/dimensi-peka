<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - DIMENSI PEKA</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Tom Select -->
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

  @stack('scripts')  
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
            <h1 class="mb-6 text-xl font-semibold text-gray-700 dark:text-gray-200">Registrasi Akun Responden</h1>

            @if ($errors->any())
              <div class="mb-4 text-sm text-red-600">
                {{ $errors->first() }}
              </div>
            @endif

            <form action="{{ url('/register') }}" method="POST">
              @csrf

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input name="name" type="text" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" value="{{ old('name') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" type="email" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" value="{{ old('email') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Umur</span>
                <input name="umur" type="number" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" value="{{ old('umur') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Jenis Kelamin</span>
                <select name="jenis_kelamin" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-select">
                  <option value="" disabled selected>Pilih jenis kelamin</option>
                  <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>L (Laki-laki)</option>
                  <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>P (Perempuan)</option>
                </select>
              </label>

               <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Kelurahan</span>
                <select id="kelurahan" name="kelurahan" placeholder="Pilih kelurahan..." required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-select">
                  <option value="" disabled selected>Pilih kelurahan</option>
                  <option value="Bendan">Bendan</option>
                  <option value="Kramatsati">Kramatsati</option>
                  <option value="Tirto">Tirto</option>
                  <option value="Medono">Medono</option>
                  <option value="Sokorejo">Sokorejo</option>
                  <option value="Noyontaan">Noyontaan</option>
                  <option value="Tondano">Tondano</option>
                  <option value="Klego">Klego</option>
                  <option value="Pekalongan Selatan">Pekalongan Selatan</option>
                  <option value="Jenggot">Jenggot</option>
                  <option value="Buaran">Buaran</option>
                  <option value="Kusuma Bangsa">Kusuma Bangsa</option>
                  <option value="Krapyak Kidul">Krapyak Kidul</option>
                  <option value="Dukuh">Dukuh</option>
                </select>
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Alamat Lengkap</span>
                <textarea name="alamat" rows="2" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-textarea">{{ old('alamat') }}</textarea>
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                <input name="kelas" type="text" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" value="{{ old('kelas') }}">
              </label>

              <label class="block text-sm mb-6">
                <span class="text-gray-700 dark:text-gray-400">Sekolah</span>
                <input name="sekolah" type="text" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" value="{{ old('sekolah') }}">
              </label>

              <button type="submit"
                class="block w-full px-4 py-2 mt-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none">
                Daftar
              </button>
            </form>

            <p class="mt-4 text-sm text-center text-gray-600 dark:text-gray-400">
              Sudah punya akun?
              <a href="{{ url('/login') }}" class="text-purple-600 hover:underline">Login disini</a>
            </p>

          </div>
        </div>
      </div>
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

  <!-- Inisialisasi Tom Select -->
  <script>
    new TomSelect("#kelurahan", {
      create: false,
      sortField: {
        field: "text",
        direction: "asc"
      }
    });
  </script>
</body>
</html>
