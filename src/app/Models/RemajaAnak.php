<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemajaAnak extends Model
{
    use HasFactory;

    protected $table = 'remajaanak';

    protected $fillable = [
        'orang_tua_id',
        'nama',
        'usia',
        'jenis_kelamin',
        'tingkat_stres',
        'tingkat_kecemasan',
        'catatan',
    ];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function aksesKuncis()
    {
        return $this->hasMany(AksesKunci::class, 'remajaanak_id');
    }
}