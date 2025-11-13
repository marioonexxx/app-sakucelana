<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = 'jurnal';
    protected $fillable = [
        'tgl_transaksi',
        'coa_id',
        'debit',
        'kredit',
        'keterangan',
        'biaya_operasional_id',
    ];

    public function coa()
    {
        return $this->belongsTo(Coa::class);
    }

    public function biayaOperasional()
    {
        return $this->belongsTo(BiayaOperasional::class);
    }


}
