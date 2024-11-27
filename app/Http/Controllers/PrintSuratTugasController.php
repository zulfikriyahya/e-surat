<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Instansi;
use Illuminate\Http\Request;

class PrintSuratTugasController extends Controller
{
    public function printSuratTugas()
    {
        // Data Kop Surat
        $instansi = Instansi::first();

        $kop = view('surat_tugas', compact('instansi'))->render();

        // Buat instansi mPDF
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => [210, 297],
            'orientation' => 'P',
        ]);

        // Tulis kode HTML ke PDF
        $mpdf->WriteHTML($kop);

        // Output file PDF ke browser
        return $mpdf->Output(public_path('storage/surat/Surat Tugas.pdf'), 'F'); // 'I' untuk inline, atau 'D' untuk download
    }
}
