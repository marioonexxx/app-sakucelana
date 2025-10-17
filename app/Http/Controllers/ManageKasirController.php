<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManageKasirController extends Controller
{
    public function index()
    {

        $produk = Produk::all();
        return view('manage-kasir.index', compact('produk'));
    }

    
    // Simpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array|min:1',
            'qty' => 'required|array',
            'harga' => 'required|array',
            'total' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            // Buat nomor transaksi unik
            $nomor_transaksi = 'TRX-' . date('YmdHis') . '-' . Str::random(4);

            // Simpan ke tabel transaksi
            $transaksi = Transaksi::create([
                'nomor_transaksi' => $nomor_transaksi,
                'tanggal' => now(),
                'total' => $request->total,
            ]);

            // Simpan detail transaksi
            foreach ($request->produk_id as $index => $produk_id) {
                TransaksiDetail::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produk_id,
                    'qty' => $request->qty[$index],
                    'harga' => $request->harga[$index],
                    'subtotal' => $request->qty[$index] * $request->harga[$index],
                ]);

                // Update stok produk
                $produk = Produk::find($produk_id);
                $produk->stok = $produk->stok - $request->qty[$index];
                $produk->save();
            }
        });

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
    }
}
