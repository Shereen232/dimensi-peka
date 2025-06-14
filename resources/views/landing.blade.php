<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Tes Kesehatan Mental</title>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Tailwind --}}
</head>
    <body class="bg-sky-50 text-gray-800">

        <!-- Header -->
        <header class="bg-white shadow sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">Deteksi Dini Gejala Mental</h1>
            <nav class="hidden md:flex gap-6 items-center">
                <a href="#tentang" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="#manfaat" class="text-gray-600 hover:text-blue-600">Formulir</a>
                <a href="#fitur" class="text-gray-600 hover:text-blue-600">Tentang</a>
                <a href="#faq" class="text-gray-600 hover:text-blue-600">Pertanyaan</a>
                <a href="#kontak" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700">Login</a>
            </nav>
            </div>
        </header>

        <!-- Hero -->
        <section class="text-center py-24 px-4 bg-gradient-to-b from-sky-100 to-white">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-blue-700 mb-4">Tes Kesehatan Deteki Dini Gejala Mental</h2>
            <p class="text-lg text-gray-600">
                Alat skrining cepat dan gratis untuk memahami kesejahteraan mental Anda. Rahasia dan terpercaya.
            </p>
            <a href="{{ route('login') }}" class="mt-8 inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition">
                Mulai Tes Sekarang
            </a>
            </div>
        </section>

        <!-- Tentang -->
        <section id="tentang" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <img src="{{ asset('images/mental-health.svg') }}" alt="Ilustrasi Tes" class="w-full" data-aos="fade-right">
            <div data-aos="fade-left">
                <h3 class="text-3xl font-semibold text-blue-700 mb-4">Apa Itu MentalSehat?</h3>
                <p class="text-gray-600 mb-4">
                MentalSehat adalah platform untuk mengevaluasi kesehatan mental Anda secara mandiri. Tes ini didesain berdasarkan indikator psikologis umum dan dapat memberikan wawasan awal mengenai kondisi emosional Anda.
                </p>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Privasi 100% terjaga</li>
                <li>Tidak butuh akun atau login</li>
                <li>Analisis langsung dan mudah dipahami</li>
                </ul>
                <a href="#"
                    class="mt-8 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-8 rounded-full shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                    Lihat Selengkapnya
                </a>
            </div>
            </div>
        </section>

        <!-- Manfaat -->
        <section id="manfaat" class="py-20 bg-blue-50">
            <div class="max-w-6xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-blue-700 mb-10" data-aos="fade-up">Mengapa Perlu Tes Kesehatan Mental?</h3>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ([
                ['title' => 'Deteksi Dini', 'desc' => 'Identifikasi tanda awal stres, depresi, atau kecemasan.'],
                ['title' => 'Kesadaran Diri', 'desc' => 'Kenali kondisi emosional yang mungkin Anda abaikan.'],
                ['title' => 'Langkah Menuju Pemulihan', 'desc' => 'Bersiap untuk mendapatkan bantuan yang sesuai.'],
                ] as $item)
                <div class="bg-white shadow rounded-2xl p-6" data-aos="zoom-in">
                    <h4 class="font-semibold text-blue-600 mb-2">{{ $item['title'] }}</h4>
                    <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
            <!-- jika ingin tombol di tengah -->
                <div class="mt-8 flex justify-center" data-aos="fade-up">
                    <a href="#"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-8 rounded-full shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
        </section>

        <!-- Fitur -->
        <section id="fitur" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-blue-700 mb-12" data-aos="fade-up">Fitur Platform</h3>
            <div class="grid md:grid-cols-4 gap-6">
                @foreach ([
                ['Ikon' => '🧠', 'fitur' => 'Analisis Cepat'],
                ['Ikon' => '🔒', 'fitur' => 'Privasi Terjamin'],
                ['Ikon' => '📱', 'fitur' => 'Responsif di Semua Perangkat'],
                ['Ikon' => '📊', 'fitur' => 'Rekomendasi Hasil Awal'],
                ] as $item)
                <div class="p-6 bg-sky-50 rounded-xl shadow" data-aos="fade-up">
                    <div class="text-4xl mb-3">{{ $item['Ikon'] }}</div>
                    <h4 class="font-medium text-blue-700">{{ $item['fitur'] }}</h4>
                </div>
                @endforeach

            </div>
            <!-- jika ingin tombol di tengah -->
                <div class="mt-8 flex justify-center" data-aos="fade-up">
                    <a href="#"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-8 rounded-full shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="py-20 bg-blue-50">
            <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-3xl font-bold text-blue-700 text-center mb-10" data-aos="fade-up">Pertanyaan Umum</h3>
            <div class="space-y-6">
                @foreach([
                ['q' => 'Apakah tes ini gratis?', 'a' => 'Ya, seluruh tes di MentalSehat sepenuhnya gratis dan dapat diakses kapan saja.'],
                ['q' => 'Apakah hasilnya akurat?', 'a' => 'Tes ini memberikan gambaran awal, bukan diagnosis resmi. Untuk diagnosis, silakan konsultasi dengan profesional.'],
                ['q' => 'Apakah data saya disimpan?', 'a' => 'Tidak. Semua data bersifat lokal dan tidak kami simpan.'],
                ] as $faq)
                <div class="bg-white rounded-xl shadow p-4" data-aos="fade-up">
                    <h4 class="font-semibold text-blue-700">{{ $faq['q'] }}</h4>
                    <p class="text-gray-600 text-sm mt-2">{{ $faq['a'] }}</p>
                </div>
                @endforeach
            </div>
            </div>
        </section>

        <!-- Kontak -->
        <section id="kontak" class="py-20 bg-white">
            <div class="max-w-3xl mx-auto text-center px-4" data-aos="fade-up">
            <h3 class="text-3xl font-bold text-blue-700 mb-6">Ada Pertanyaan atau Masukan?</h3>
            <p class="text-gray-600 mb-6">Tim kami siap membantu Anda. Silakan kirimkan pertanyaan atau saran Anda.</p>
            <a href="mailto:cs@mentalsehat.com" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700">
                Kirim Email
            </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center py-6 text-sm text-gray-500 border-t bg-sky-50">
            &copy; {{ date('Y') }} MentalSehat. Dibuat dengan ❤️ untuk masyarakat Indonesia.
        </footer>

        <!-- AOS Animations -->
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init({ duration: 1000, once: true });
        </script>
    </body>
</html>
