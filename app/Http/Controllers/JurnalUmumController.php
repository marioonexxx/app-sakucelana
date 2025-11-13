<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    /**
     * Tampilkan halaman Jurnal Umum dengan filter tanggal
     */
    public function index(Request $request)
    {
        // Query jurnal dengan relasi coa dan lawan
        $query = Jurnal::with('coa.lawan');

        // Filter berdasarkan tanggal jika ada
        if ($request->from) {
            $query->whereDate('tgl_transaksi', '>=', $request->from);
        }
        if ($request->to) {
            $query->whereDate('tgl_transaksi', '<=', $request->to);
        }

        // Ambil semua data, urut terbaru
        $jurnals = $query->orderBy('tgl_transaksi', 'desc')->get();

        return view('laporan-keuangan.jurnalumum', compact('jurnals'));
    }
}
