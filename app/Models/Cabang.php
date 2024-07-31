<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_cabang',
        'alamat',
        'kontak',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_cabang');
    }
}
