<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Landing Page - SDQ</title>
  <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header class="header d-flex align-items-center sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="sitename">SDQ Responden</h1>
      <nav class="navmenu d-none d-lg-block">
        <ul class="d-flex gap-4 mb-0 list-unstyled">
          <li><a href="#hero" class="nav-link">Home</a></li>
          <li><a href="#about" class="nav-link">Tentang</a></li>
          <li><a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero -->
    <section id="hero" class="hero section py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-up">
            <h1>Selamat Datang di Aplikasi SDQ</h1>
            <p class="lead">Platform untuk mengisi dan melihat hasil kuesioner Strength and Difficulties Questionnaire bagi siswa usia 11–18 tahun.</p>
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Mulai Sekarang</a>
          </div>
          <div class="col-lg-6 text-center" data-aos="zoom-out">
            <img src="{{ asset('landing/assets/img/hero-img.png') }}" class="img-fluid" alt="Hero">
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="about section py-5">
      <div class="container">
        <div class="section-title text-center">
          <h2>Tentang Aplikasi</h2>
          <p>Aplikasi ini digunakan untuk mengukur kesulitan dan kekuatan siswa melalui kuesioner SDQ. Hasilnya akan digunakan sebagai dasar analisis lebih lanjut.</p>
        </div>
      </div>
    </section>

    <!-- Call To Action -->
    <section class="call-to-action bg-primary text-white text-center py-5">
      <div class="container">
        <h3>Ayo mulai sekarang!</h3>
        <p class="mb-4">Klik tombol di bawah untuk login dan mengisi kuesioner.</p>
        <a href="{{ route('login') }}" class="btn btn-light">Login</a>
      </div>
    </section>

  </main>

  <footer class="footer bg-dark text-white text-center py-4">
    <div class="container">
      <p class="mb-0">© 2025 Aplikasi SDQ. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Vendor JS -->
  <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landing/assets/js/main.js') }}"></script>

</body>
</html>
