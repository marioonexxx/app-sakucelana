<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Coa;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        // Ambil akun pendapatan (tipe = 'Pendapatan') dan biaya (tipe = 'Beban')
        $pendapatanCoas = Coa::where('tipe', 'Pendapatan')->get();
        $bebanCoas = Coa::where('tipe', 'Beban')->get();

        // Hitung total per akun
        $pendapatan = [];
        $totalPendapatan = 0;
        foreach ($pendapatanCoas as $coa) {
            $query = Jurnal::where('coa_id', $coa->id);
            if ($from) $query->whereDate('tgl_transaksi', '>=', $from);
            if ($to) $query->whereDate('tgl_transaksi', '<=', $to);
            $nilai = $query->sum('kredit'); // pendapatan biasanya kredit
            $pendapatan[] = ['coa' => $coa, 'nilai' => $nilai];
            $totalPendapatan += $nilai;
        }

        $beban = [];
        $totalBeban = 0;
        foreach ($bebanCoas as $coa) {
            $query = Jurnal::where('coa_id', $coa->id);
            if ($from) $query->whereDate('tgl_transaksi', '>=', $from);
            if ($to) $query->whereDate('tgl_transaksi', '<=', $to);
            $nilai = $query->sum('debit'); // beban biasanya debit
            $beban[] = ['coa' => $coa, 'nilai' => $nilai];
            $totalBeban += $nilai;
        }

        $labaBersih = $totalPendapatan - $totalBeban;

        return view('laporan-keuangan.labarugi', compact(
            'pendapatan', 'beban', 'totalPendapatan', 'totalBeban', 'labaBersih', 'from', 'to'
        ));
    }
}
