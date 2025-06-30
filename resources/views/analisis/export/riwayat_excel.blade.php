<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>JK</th>
            <th>NIK</th>
            <th>Kelas</th>
            <th>Sekolah</th>

            {{-- SDQ 1 - 25 --}}
            @for($i = 1; $i <= 25; $i++)
                <th>{{ $i }}</th>
            @endfor

            <th>ES</th>
            <th>CP</th>
            <th>H</th>
            <th>P</th>
            <th>PRO</th>
            <th>T-Item</th>
            <th>T-Aspek</th>

            {{-- Gangguan --}}
            <th>Gangguan ES</th>
            <th>Gangguan CP</th>
            <th>Gangguan H</th>
            <th>Gangguan P</th>
            <th>Gangguan PRO</th>

            <th>Skor Total Kekuatan</th>
            <th>Skor Total Kesulitan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
        $kategori = function($kode, $val) {
            return match ($kode) {
                'ES' => $val <= 5 ? 'NORMAL' : ($val >= 7 ? 'ABNORMAL' : 'BORDERLINE'),
                'CP' => $val <= 3 ? 'NORMAL' : ($val >= 10 ? 'ABNORMAL' : 'BORDERLINE'),
                'H'  => $val <= 5 ? 'NORMAL' : ($val >= 7 ? 'ABNORMAL' : 'BORDERLINE'),
                'P'  => $val <= 3 ? 'NORMAL' : ($val >= 6 ? 'ABNORMAL' : 'BORDERLINE'),
                'PRO'=> $val >= 6 ? 'NORMAL' : ($val <= 4 ? 'ABNORMAL' : 'BORDERLINE'),
                default => '-'
            };
        };
        @endphp

        @foreach($riwayat as $index => $item)
        @php
            $skor_total = $item->skor_es + $item->skor_cp + $item->skor_h + $item->skor_p;
            $total_status = $skor_total <= 15 ? 'NORMAL' : ($skor_total >= 20 ? 'ABNORMAL' : 'BORDERLINE');
            $jawaban = json_decode($item->jawaban); // pastikan array 25 elemen
        @endphp
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->user->umur }}</td>
            <td>{{ $item->user->jenis_kelamin }}</td>
            <td>{{ $item->user->nik }}</td>
            <td>{{ $item->user->kelas }}</td>
            <td>{{ $item->user->sekolah }}</td>

            {{-- Jawaban SDQ 1-25 --}}
            @foreach ($item->answers as $answer)
                <td>{{ $answer->option->score }}</td>
            @endforeach
            
                
            <td>{{ $item->skor_es }}</td>
            <td>{{ $item->skor_cp }}</td>
            <td>{{ $item->skor_h }}</td>
            <td>{{ $item->skor_p }}</td>
            <td>{{ $item->skor_pro }}</td>
            <td>{{ $skor_total }}</td>
            <td>25</td>

            <td>{{ $kategori('ES', $item->skor_es) }}</td>
            <td>{{ $kategori('CP', $item->skor_cp) }}</td>
            <td>{{ $kategori('H', $item->skor_h) }}</td>
            <td>{{ $kategori('P', $item->skor_p) }}</td>
            <td>{{ $kategori('PRO', $item->skor_pro) }}</td>

            <td>{{ $item->skor_pro }}</td>
            <td>{{ $skor_total }}</td>
            <td>{{ $total_status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
