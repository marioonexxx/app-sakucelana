<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ManageTransaksiController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi beserta detail produknya
        $transaksi = Transaksi::with('detail.produk')->orderBy('tanggal', 'desc')->get();

        return view('manage-transaksi.index', compact('transaksi'));
    }

    /**
     * Display the specified resource (Detail Transaksi).
     * Optional kalau pakai modal, tidak perlu dipanggil langsung.
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('detail.produk')->findOrFail($id);
        return view('manage-transaksi.show', compact('transaksi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
