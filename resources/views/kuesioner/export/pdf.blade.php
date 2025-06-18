<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Data Hasil Skrining</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 6px;
      text-align: center;
    }
    .no-border {
      border: none;
    }
    .text-left {
      text-align: left;
    }
    .bg-yellow {
      background-color: #ffff99;
      font-weight: bold;
    }
    .text-red {
      color: red;
      font-weight: bold;
    }
    .text-small {
      font-size: 10px;
    }
  </style>
</head>
<body>
  <table class="no-border">
    <tr class="no-border">
      <td colspan="2" class="no-border">
        <img src="{{ public_path('logo.png') }}" alt="Logo" width="80">
      </td>
      <td colspan="4" class="no-border" style="text-align: center;">
        <h3>PEMERINTAH KOTA PEKALONGAN<br>DINAS KESEHATAN</h3>
        <div class="text-small">
          Jl. Jetayu No.4 Telp/Fax (0285) 421972 Pekalongan Kode Pos 51114<br>
          Website: <u>http://www.dinkes.kotapekalongan.go.id</u> |
          E-mail: <u>dinkes_kotapekalongan@yahoo.com</u>
        </div>
      </td>
    </tr>
  </table>

  <hr>

  <h4 style="text-align: center;" class="text-red">Laporan Data Hasil Skrining</h4>
  <p><strong>Periode:</strong> {{ $periode }}</p>
  <p><strong>Puskesmas:</strong> {{ $puskesmas ?? '-' }}</p>
  <p><strong>Total Skrining:</strong> {{ $total }}</p>

  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Kategori</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <tr>
    <td>1</td>
    <td>Normal</td>
    <td>{{ $normal }}</td>
</tr>
<tr>
    <td>2</td>
    <td>Borderline</td>
    <td>{{ $borderline }}</td>
</tr>
<tr>
    <td>3</td>
    <td>Abnormal</td>
    <td>{{ $abnormal }}</td>
</tr>
<tr style="background-color: yellow;">
    <td colspan="2"><strong>Total Keseluruhan</strong></td>
    <td><strong>{{ $total }}</strong></td>
</tr>
    </tbody>
  </table>

  <br><br><br>

  <table class="no-border" width="100%">
    <tr class="no-border">
      <td class="text-center no-border">
        Mengetahui<br>
        Kepala Puskesmas<br><br><br><br>
        (...........................)
      </td>
      <td class="text-center no-border">
        Pekalongan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
        Yang membuat,<br><br><br><br>
        (...........................)
      </td>
    </tr>
  </table>
</body>
</html>
