<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use Illuminate\Http\Request;

class ManageCoaController extends Controller
{
    public function index()
    {
        $data = Coa::with('lawan')
            ->orderBy('kode', 'asc')
            ->get();

        return view('manage-koderekening.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'      => 'required|string|max:50|unique:coa,kode',
            'nama'      => 'required|string|max:255',
            'tipe'      => 'required|in:Aktiva,Hutang,Modal,Pendapatan,Beban',
            'normal'    => 'required|in:Debit,Kredit',
            'lawan_id'  => 'nullable|exists:coa,id',
        ]);

        Coa::create([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'tipe'      => $request->tipe,
            'normal'    => $request->normal,
            'lawan_id'  => $request->lawan_id,
        ]);

        return redirect()->route('coa.index')->with('success', 'Kode rekening berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $coa = Coa::findOrFail($id);

        $request->validate([
            'kode'      => 'required|string|max:50|unique:coa,kode,' . $coa->id,
            'nama'      => 'required|string|max:255',
            'tipe'      => 'required|in:Aktiva,Hutang,Modal,Pendapatan,Beban',
            'normal'    => 'required|in:Debit,Kredit',
            'lawan_id'  => 'nullable|exists:coa,id',
        ]);

        $coa->update([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'tipe'      => $request->tipe,
            'normal'    => $request->normal,
            'lawan_id'  => $request->lawan_id,
        ]);

        return redirect()->route('coa.index')->with('success', 'Kode rekening berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $coa = Coa::findOrFail($id);
        $coa->delete();

        return redirect()->route('coa.index')->with('success', 'Kode rekening berhasil dihapus!');
    }
}
