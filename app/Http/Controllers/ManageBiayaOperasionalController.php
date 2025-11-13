<?php

namespace App\Http\Controllers;

use App\Models\BiayaOperasional;
use App\Models\Coa;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageBiayaOperasionalController extends Controller
{
    public function index()
    {
        $data = BiayaOperasional::with('coa.lawan')->get();
        $coas = Coa::all(); // Untuk dropdown
        return view('manage-biayaoperasional.index', compact('data', 'coas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_transaksi' => 'required|date',
            'coa_id'        => 'required|exists:coa,id',
            'nilai'         => 'required|numeric',
            'bukti'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan'    => 'nullable|string',
        ]);

        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('bukti_operasional', 'public');
        }

        $biaya = BiayaOperasional::create($validated);

        // Simpan ke jurnal (double entry)
        $coa = Coa::find($validated['coa_id']);
        if ($coa && $coa->lawan_id) {
            // Debit untuk akun biaya
            Jurnal::create([
                'tgl_transaksi' => $validated['tgl_transaksi'],
                'coa_id'        => $coa->id,
                'debit'         => $validated['nilai'],
                'kredit'        => 0,
                'keterangan'    => $validated['keterangan'],
                'biaya_operasional_id' => $biaya->id,
            ]);

            // Kredit untuk akun lawan
            Jurnal::create([
                'tgl_transaksi' => $validated['tgl_transaksi'],
                'coa_id'        => $coa->lawan_id,
                'debit'         => 0,
                'kredit'        => $validated['nilai'],
                'keterangan'    => $validated['keterangan'],
                'biaya_operasional_id' => $biaya->id,
            ]);
        }

        return redirect()->back()->with('success', 'Data biaya operasional berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = BiayaOperasional::findOrFail($id);

        $validated = $request->validate([
            'tgl_transaksi' => 'required|date',
            'coa_id'        => 'required|exists:coa,id',
            'nilai'         => 'required|numeric',
            'bukti'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan'    => 'nullable|string',
        ]);

        if ($request->hasFile('bukti')) {
            if ($data->bukti && Storage::disk('public')->exists($data->bukti)) {
                Storage::disk('public')->delete($data->bukti);
            }
            $validated['bukti'] = $request->file('bukti')->store('bukti_operasional', 'public');
        }

        $data->update($validated);

        // Hapus jurnal lama terkait biaya ini
        Jurnal::where('biaya_operasional_id', $data->id)->delete();

        // Simpan jurnal baru
        $coa = Coa::find($validated['coa_id']);
        if ($coa && $coa->lawan_id) {
            Jurnal::create([
                'tgl_transaksi' => $validated['tgl_transaksi'],
                'coa_id'        => $coa->id,
                'debit'         => $validated['nilai'],
                'kredit'        => 0,
                'keterangan'    => $validated['keterangan'],
                'biaya_operasional_id' => $data->id,
            ]);

            Jurnal::create([
                'tgl_transaksi' => $validated['tgl_transaksi'],
                'coa_id'        => $coa->lawan_id,
                'debit'         => 0,
                'kredit'        => $validated['nilai'],
                'keterangan'    => $validated['keterangan'],
                'biaya_operasional_id' => $data->id,
            ]);
        }

        return redirect()->back()->with('success', 'Data biaya operasional berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = BiayaOperasional::findOrFail($id);

        if ($data->bukti && Storage::disk('public')->exists($data->bukti)) {
            Storage::disk('public')->delete($data->bukti);
        }

        // Hapus jurnal terkait
        Jurnal::where('biaya_operasional_id', $data->id)->delete();

        $data->delete();

        return redirect()->back()->with('success', 'Data biaya operasional berhasil dihapus!');
    }
}
