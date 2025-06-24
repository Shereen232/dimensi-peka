<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Skrining Mental Emosional Anak</title>
    <style>
        @page {
            size: A4;
            margin: 2cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            color: #000;
            line-height: 1.5;
        }

        .container-header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header-column {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .header-left {
            width: 15%;
            text-align: left;
        }

        .header-center {
            width: 70%;
            text-align: center;
        }

        .header-right {
            width: 15%;
        }

        .header-logo {
            width: 100px;
            height: 140px;
            object-fit: contain;
        }

        .header-text h1 {
            font-size: 16pt;
            margin: 0;
            font-weight: bold;
        }

        .header-text h2 {
            font-size: 16pt;
            margin: 5px 0 0;
            font-weight: bold;
        }

        .header-text p {
            font-size: 12pt;
            margin: 2px 0;
        }

        .header-text u {
            text-decoration: underline;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 14pt;
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        td {
            padding: 5px;
            vertical-align: top;
        }

        td.label {
            width: 35%;
            font-weight: bold;
        }

        .category-title {
            margin-top: 15px;
            font-weight: bold;
            font-size: 13pt;
            border-top: 1px dashed #444;
            padding-top: 6px;
        }
    </style>
</head>
<body>
    <div class="container-header">
        <div class="header-column header-left">
            <img src="{{ public_path('logo_pekalongan.png') }}" alt="Logo Kota Pekalongan" class="header-logo">
        </div>
        <div class="header-column header-center header-text">
            <h1>PEMERINTAH KOTA PEKALONGAN</h1>
            <h2>DINAS KESEHATAN</h2>
            <p>Jl. Jetayu No.4 Telp/Fax (0285) 421972 Pekalongan 51114</p>
            <p>Website: <u>http://www.dinkes.kotapekalongan.go.id</u> | Email: <u>dinkes_kotapekalongan@yahoo.com</u></p>
        </div>
        <div class="header-column header-right">
            <!-- Kosong -->
        </div>
    </div>


    <div class="section">
        <div class="section-title">Data Anak</div>
        <table>
            <tr><td class="label">ID Anak</td><td>: {{ $user->id }}</td></tr>
            <tr><td class="label">Nama</td><td>: {{ $user->name }}</td></tr>
            <tr><td class="label">Jenis Kelamin</td><td>: {{ $user->jenis_kelamin ?? '-' }}</td></tr>
            <tr><td class="label">Umur</td><td>: {{ $user->umur }} tahun</td></tr>
            <tr><td class="label">Skrining pada</td><td>: {{ $riwayat->tanggal }}</td></tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Hasil Skrining Mental Emosional</div>
        <p>
            Berdasarkan Strength and Difficulties Questionnaire, berikut adalah hasil skrining dan interpretasinya:
        </p>

        <table>
            <tr><td class="label">Total Kesulitan</td><td>: {{ $riwayat->hasil_total }} (Skor: {{ $riwayat->total_kesulitan }})</td></tr>
            <tr><td class="label">Keterangan</td><td>: {{ $keterangan['Total']['ket'] ?? '-' }}</td></tr>
            <tr><td class="label">Rekomendasi</td><td>: {{ $keterangan['Total']['rekom'] ?? '-' }}</td></tr>
        </table>

        @php
            $kategori = [
                'E' => 'Gejala Emosional',
                'C' => 'Masalah Perilaku',
                'H' => 'Hiperaktivitas',
                'P' => 'Masalah Teman Sebaya',
                'Pro' => 'Perilaku Prososial'
            ];
            $map = ['E' => 'es', 'C' => 'cp', 'H' => 'h', 'P' => 'p', 'Pro' => 'pro'];
        @endphp

        @foreach ($kategori as $kode => $label)
            @php
                $hasil = $riwayat->{'hasil_' . $map[$kode]};
                $skor = $riwayat->{'skor_' . $map[$kode]};
            @endphp
            <div class="category-title">{{ $label }} ({{ $kode }})</div>
            <table>
                <tr><td class="label">Hasil</td><td>: {{ $hasil }} (Skor: {{ $skor }})</td></tr>
                <tr><td class="label">Keterangan</td><td>: {{ $keterangan[$kode]['ket'] ?? '-' }}</td></tr>
                <tr><td class="label">Rekomendasi</td><td>: {{ $keterangan[$kode]['rekom'] ?? '-' }}</td></tr>
            </table>
        @endforeach
    </div>
</body>
</html>
