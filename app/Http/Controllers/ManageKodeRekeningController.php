<?php

namespace App\Http\Controllers;

use App\Models\KodeRekening;
use Illuminate\Http\Request;

class ManageKodeRekeningController extends Controller
{
    public function index()
    {
        $data = KodeRekening::all();
        return view('manage-koderekening.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50',
            'nama_rekening' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
        ]);

        KodeRekening::create($request->all());

        return redirect()->route('koderekening.index')->with('success', 'Kode rekening berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:50',
            'nama_rekening' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
        ]);

        $item = KodeRekening::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('koderekening.index')->with('success', 'Kode rekening berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = KodeRekening::findOrFail($id);
        $item->delete();

        return redirect()->route('koderekening.index')->with('success', 'Kode rekening berhasil dihapus!');
    }
}
