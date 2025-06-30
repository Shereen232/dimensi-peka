<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RiwayatExport implements FromView
{
    protected $riwayat;

    public function __construct($riwayat)
    {
        $this->riwayat = $riwayat;
    }

    public function view(): View
    {
        return view('analisis.export.riwayat_excel', [
            'riwayat' => $this->riwayat
        ]);
    }
}
