<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_role',
        'id_cabang',
        'nama',
        'username',
        'password',
        'no_hp',
        'alamat',
        'foto',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_user');
    }
}
