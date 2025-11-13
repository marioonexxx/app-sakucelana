<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Coa;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function index(Request $request)
    {
        $coas = Coa::all(); // Semua akun untuk filter

        $query = Jurnal::with('coa.lawan')->orderBy('tgl_transaksi');

        // Filter berdasarkan tanggal
        if ($request->from) {
            $query->whereDate('tgl_transaksi', '>=', $request->from);
        }
        if ($request->to) {
            $query->whereDate('tgl_transaksi', '<=', $request->to);
        }

        // Filter berdasarkan akun
        if ($request->coa_id) {
            $query->where('coa_id', $request->coa_id);
        }

        $jurnals = $query->get();

        // Hitung saldo awal jika filter akun dipilih
        $saldoAwal = 0;
        if ($request->coa_id && $request->from) {
            $saldoAwal = Jurnal::where('coa_id', $request->coa_id)
                ->whereDate('tgl_transaksi', '<', $request->from)
                ->sum('debit') - Jurnal::where('coa_id', $request->coa_id)
                ->whereDate('tgl_transaksi', '<', $request->from)
                ->sum('kredit');
        }

        return view('laporan-keuangan.bukubesar', compact('jurnals', 'coas', 'saldoAwal'));
    }
}
