<?php

namespace App\Http\Controllers;

use App\Models\BiayaOperasional;
use App\Models\KodeRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageBiayaOperasionalController extends Controller
{
    public function index()
    {
        $data = BiayaOperasional::with('koderekening')->get();
        $koderekening = KodeRekening::all();
        return view('manage-biayaoperasional.index', compact('data', 'koderekening'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_transaksi' => 'required|date',
            'koderekening_id' => 'required|exists:koderekening,id',
            'nilai' => 'required|numeric',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('bukti_operasional', 'public');
        }

        BiayaOperasional::create($validated);

        return redirect()->back()->with('success', 'Data biaya operasional berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = BiayaOperasional::findOrFail($id);

        $validated = $request->validate([
            'tgl_transaksi' => 'required|date',
            'koderekening_id' => 'required|exists:koderekening,id',
            'nilai' => 'required|numeric',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('bukti')) {
            // Hapus file lama jika ada
            if ($data->bukti && Storage::disk('public')->exists($data->bukti)) {
                Storage::disk('public')->delete($data->bukti);
            }
            $validated['bukti'] = $request->file('bukti')->store('bukti_operasional', 'public');
        }

        $data->update($validated);

        return redirect()->back()->with('success', 'Data biaya operasional berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = BiayaOperasional::findOrFail($id);

        if ($data->bukti && Storage::disk('public')->exists($data->bukti)) {
            Storage::disk('public')->delete($data->bukti);
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data biaya operasional berhasil dihapus!');
    }
}
