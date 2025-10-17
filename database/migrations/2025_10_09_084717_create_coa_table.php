<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coa', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // kode akun, misal 101, 201
            $table->string('nama');           // nama akun, misal "Kas", "Pendapatan Penjualan"
            $table->enum('tipe', ['Aktiva', 'Hutang', 'Modal', 'Pendapatan', 'Beban']); // tipe akun
            $table->enum('normal', ['Debit', 'Kredit']); // normal balance akun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coa');
    }
};
