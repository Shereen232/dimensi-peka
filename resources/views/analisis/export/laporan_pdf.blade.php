<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Data Hasil Skrining</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: center; }
    .kop td { border: none; }
    .title { text-align: center; margin-top: 10px; font-weight: bold; font-size: 14px; }
    .subtitle { text-align: left; margin-top: 10px; font-weight: bold; font-size: 14px; }
    .footer { margin-top: 40px; text-align: right; }
    .highlight { background-color: yellow; font-weight: bold; }
  </style>
</head>
<body>

  <!-- Kop Surat -->
  <table class="kop">
    <tr>
      <td style="width: 80px;">
        <img src="{{ public_path('logo_pekalongan.png') }}" width="70">
      </td>
      <td>
        <div style="text-align: center;">
          <strong style="font-size: 14pt;">PEMERINTAH KOTA PEKALONGAN</strong><br>
          <strong style="font-size: 12pt;">DINAS KESEHATAN</strong><br>
          Jl. Jetayu No.4 Telp/Fax. (0285) 421972 Pekalongan 51114<br>
          Website: http://www.dinkes.kotapekalongan.go.id | E-mail: dinkes_kotapekalongan@yahoo.com
        </div>
      </td>
    </tr>
  </table>

  <hr style="margin-top: 5px;">

  <!-- Judul -->
  <div class="title">
    Laporan Data Hasil Skrining<br>
  </div>
  <div class="subtitle">
    Periode: <u>{{ $periode }}</u><br>
    Total Skrining: <strong>{{ $total }}</strong><br><br>
    Hasil Skrining per Kelurahan =
  </div>

  <!-- Tabel -->
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kelurahan</th>
        <th>Normal</th>
        <th>Borderline</th>
        <th>Abnormal</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $i => $d)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $d['kelurahan'] }}</td>
            <td>{{ $d['normal'] }}</td>
            <td>{{ $d['borderline'] }}</td>
            <td>{{ $d['abnormal'] }}</td>
            <td>{{ $d['total'] }}</td>
        </tr>
      @endforeach

      <tr class="highlight">
        <td colspan="2">Total Keseluruhan</td>
        <td>{{ $totalNormal }}</td>
        <td>{{ $totalBorderline }}</td>
        <td>{{ $totalAbnormal }}</td>
        <td>{{ $total }}</td>
      </tr>
    </tbody>
  </table>

  <!-- Tanda Tangan -->
  <div class="footer">
    Pekalongan, {{ now()->translatedFormat('d F Y') }}<br><br>
    Yang membuat,<br><br><br><br>
    (...................................)
  </div>

</body>
</html>
