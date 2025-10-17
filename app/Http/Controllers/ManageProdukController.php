<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ManageProdukController extends Controller
{
    public function index()
    {

        $data = Produk::all();

        return view('manage-produk.index', compact('data'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:produk,kode',
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Produk::create($validated);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }


    // Update Produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:produk,kode,' . $produk->id,
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);


        $produk->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }

    // Delete Produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
