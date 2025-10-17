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
    ];
  
    // public function jurnal()
    // {
    //     return $this->hasMany(Jurnal::class, 'coa_id');
    // }
}
