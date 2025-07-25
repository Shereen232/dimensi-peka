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
    <div class="flex-1 h-full max-w-2xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto">
        <div class="flex items-center justify-center p-6 sm:p-12">
          <div class="w-full max-w-sm">
            
            <!-- Logo -->
            <div class="flex justify-center gap-4 mb-6">
              <img src="{{ asset('images/logo_kemenkes.jpg') }}" alt="Logo Kemenkes" class="h-12 object-contain" />
              <img src="{{ asset('images/logo_germas.jpg') }}" alt="Logo Germas" class="h-12 object-contain" />
            </div>

            <!-- Heading -->
            <div class="text-center mb-6">
              <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Registrasi Akun Responden</h1>
              <p class="text-sm text-gray-600 dark:text-gray-400">Sistem Informasi Kesehatan Jiwa</p>
            </div>

            @if ($errors->any())
              <div class="mb-4 p-3 rounded-md bg-red-100 text-red-700 dark:bg-red-700 dark:text-red-100 text-sm">
                {{ $errors->first() }}
              </div>
            @endif

            <form action="{{ url('/register') }}" method="POST">
              @csrf

              @php
                $commonClass = "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray";
              @endphp

              <!-- Semua form disesuaikan tampilan -->
              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">NIK</span>
                <input name="nik" type="text" required maxlength="16" class="{{ $commonClass }}" value="{{ old('nik') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input name="name" type="text" required class="{{ $commonClass }}" value="{{ old('name') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" type="email" required class="{{ $commonClass }}" value="{{ old('email') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password" required class="{{ $commonClass }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Umur</span>
                <input name="umur" type="number" required class="{{ $commonClass }}" value="{{ old('umur') }}">
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Jenis Kelamin</span>
                <select name="jenis_kelamin" required class="{{ $commonClass }}">
                  <option value="" disabled selected>Pilih jenis kelamin</option>
                  <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>L (Laki-laki)</option>
                  <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>P (Perempuan)</option>
                </select>
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Kelurahan</span>
                <select id="kelurahan" name="kelurahan" required class="{{ $commonClass }}">
                  <option value="" disabled selected>Pilih kelurahan</option>
                  @foreach ($listKelurahan as $item)
                    <option value="{{$item->nama}}">{{$item->nama}}</option>
                  @endforeach
                </select>
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Alamat Lengkap</span>
                <textarea name="alamat" rows="2" class="{{ $commonClass }}">{{ old('alamat') }}</textarea>
              </label>

              <label class="block text-sm mb-3">
                <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                <input name="kelas" type="text" required class="{{ $commonClass }}" value="{{ old('kelas') }}">
              </label>

              <label class="block text-sm mb-6">
                <span class="text-gray-700 dark:text-gray-400">Sekolah</span>
                <input name="sekolah" type="text" required class="{{ $commonClass }}" value="{{ old('sekolah') }}">
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
