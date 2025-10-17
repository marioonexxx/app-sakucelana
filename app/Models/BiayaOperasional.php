<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaOperasional extends Model
{
    use HasFactory;
    protected $table = 'biaya_operasional';
    protected $fillable = ['tgl_transaksi','koderekening_id','nilai','bukti','keterangan'];

    public function koderekening()
    {
        return $this->belongsTo(KodeRekening::class, 'koderekening_id');
    }
}
