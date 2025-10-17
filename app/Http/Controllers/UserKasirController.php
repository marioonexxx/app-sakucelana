<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserKasirController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalTransaksi = Transaksi::count();
        $totalPenjualan = Transaksi::sum('total');
        return view('user-kasir.dashboard', compact('totalProduk','totalTransaksi','totalPenjualan'));
    }

    public function showprofil()
    {        
        $user = Auth::user();
        return view('user-kasir.profil', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',           
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6',
        ]);

        // Update foto jika ada
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        // Update field lain
        $user->name = $request->name;        
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
