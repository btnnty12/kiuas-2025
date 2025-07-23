<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AksesKunci extends Model
{
    protected $fillable = [
        'orang_tua_id',
        'remajaanak_id',
        'kunci_terenkripsi',
    ];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function remajaAnak()
    {
        return $this->belongsTo(RemajaAnak::class, 'remajaanak_id');
    }
}
