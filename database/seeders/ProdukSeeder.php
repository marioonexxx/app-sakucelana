<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            ['kode' => 'PRD001', 'nama' => 'Pensil 2B', 'stok' => 100, 'harga' => 2500],
            ['kode' => 'PRD002', 'nama' => 'Buku Tulis', 'stok' => 200, 'harga' => 5000],
            ['kode' => 'PRD003', 'nama' => 'Penghapus', 'stok' => 150, 'harga' => 1500],
            ['kode' => 'PRD004', 'nama' => 'Bolpoin Hitam', 'stok' => 300, 'harga' => 3500],
            ['kode' => 'PRD005', 'nama' => 'Spidol Whiteboard', 'stok' => 50, 'harga' => 10000],
            ['kode' => 'PRD006', 'nama' => 'Kertas A4', 'stok' => 500, 'harga' => 55000],
            ['kode' => 'PRD007', 'nama' => 'Map Plastik', 'stok' => 120, 'harga' => 2000],
            ['kode' => 'PRD008', 'nama' => 'Stapler', 'stok' => 40, 'harga' => 25000],
            ['kode' => 'PRD009', 'nama' => 'Isi Staples', 'stok' => 400, 'harga' => 5000],
            ['kode' => 'PRD010', 'nama' => 'Penggaris 30cm', 'stok' => 80, 'harga' => 6000],
        ];

        foreach ($produk as $item) {
            Produk::create($item);
        }
    }
}
