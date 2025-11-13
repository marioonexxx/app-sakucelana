<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use App\Models\Jurnal;
use Illuminate\Http\Request;

class NeracaSaldoController extends Controller
{
    public function index(Request $request)
    {
        $coas = Coa::all(); // Semua akun

        // Tanggal filter
        $from = $request->from;
        $to = $request->to;

        $neraca = [];

        foreach ($coas as $coa) {
            $query = Jurnal::where('coa_id', $coa->id);

            if ($from) {
                $query->whereDate('tgl_transaksi', '>=', $from);
            }
            if ($to) {
                $query->whereDate('tgl_transaksi', '<=', $to);
            }

            $totalDebit = $query->sum('debit');
            $totalKredit = $query->sum('kredit');
            $saldo = $totalDebit - $totalKredit;

            $neraca[] = [
                'coa' => $coa,
                'debit' => $totalDebit,
                'kredit' => $totalKredit,
                'saldo' => $saldo
            ];
        }

        return view('laporan-keuangan.neracasaldo', compact('neraca', 'coas', 'from', 'to'));
    }
}
