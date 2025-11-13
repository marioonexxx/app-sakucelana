<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Coa;
use App\Models\Jurnal;
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

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array|min:1',
            'qty' => 'required|array',
            'harga' => 'required|array',
            'total' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {

            $nomor_transaksi = 'TRX-' . date('YmdHis') . '-' . Str::random(4);

            // Simpan transaksi utama
            $transaksi = Transaksi::create([
                'nomor_transaksi' => $nomor_transaksi,
                'tanggal' => now(),
                'total' => $request->total,
            ]);

            // Simpan detail transaksi & update stok
            foreach ($request->produk_id as $index => $produk_id) {
                TransaksiDetail::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produk_id,
                    'qty' => $request->qty[$index],
                    'harga' => $request->harga[$index],
                    'subtotal' => $request->qty[$index] * $request->harga[$index],
                ]);

                $produk = Produk::find($produk_id);
                $produk->stok -= $request->qty[$index];
                $produk->save();
            }

            // Ambil COA Pendapatan (penjualan) dan lawan_id-nya
            $coaPendapatan = Coa::where('kode', '411')->firstOrFail(); // Penjualan Vape
            $coaKas = $coaPendapatan->lawan; // otomatis Kas Toko

            if (!$coaKas) {
                throw new \Exception("Lawan akun untuk '{$coaPendapatan->nama}' belum diisi di COA.");
            }

            // Debit Kas Toko
            Jurnal::create([
                'tgl_transaksi' => now(),
                'coa_id' => $coaKas->id,
                'debit' => $request->total,
                'kredit' => 0,
                'keterangan' => 'Penjualan tunai kasir #' . $nomor_transaksi,
                'biaya_operasional_id' => null,
            ]);

            // Kredit Pendapatan Penjualan
            Jurnal::create([
                'tgl_transaksi' => now(),
                'coa_id' => $coaPendapatan->id,
                'debit' => 0,
                'kredit' => $request->total,
                'keterangan' => 'Pendapatan penjualan kasir #' . $nomor_transaksi,
                'biaya_operasional_id' => null,
            ]);
        });

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan dan jurnal dibuat.');
    }
}
