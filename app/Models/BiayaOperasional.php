<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaOperasional extends Model
{
    use HasFactory;

    protected $table = 'biaya_operasional';

    protected $fillable = [
        'tgl_transaksi',
        'coa_id',
        'nilai',
        'bukti',
        'keterangan'
    ];

    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }

    public function coa()
    {
        return $this->belongsTo(Coa::class);
    }
}
