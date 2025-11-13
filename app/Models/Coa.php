<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;

    protected $table = 'coa';

    protected $fillable = [
        'kode',
        'nama',
        'tipe',
        'normal',
        'lawan_id',
    ];

    /**
     * Relasi ke tabel jurnal (1 akun punya banyak jurnal)
     */
    public function jurnal()
    {
        return $this->hasMany(Jurnal::class, 'coa_id');
    }

    /**
     * Relasi ke akun lawan (self relationship)
     */
    public function lawan()
    {
        return $this->belongsTo(Coa::class, 'lawan_id');
    }

    /**
     * Relasi balik untuk melihat akun-akun yang menjadikan akun ini sebagai lawan
     */
    public function lawanDari()
    {
        return $this->hasMany(Coa::class, 'lawan_id');
    }
}
