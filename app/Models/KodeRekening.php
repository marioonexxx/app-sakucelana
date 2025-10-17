<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeRekening extends Model
{
    use HasFactory;
    protected $table = 'koderekening';
    protected $fillable = ['kode', 'nama_rekening', 'jenis'];

    public function biayaoperasional()
    {
        return $this->hasMany(BiayaOperasional::class, 'koderekening_id');
    }
}
