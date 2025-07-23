<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanEmosi extends Model
{
    use HasFactory;

    protected $fillable = [
        'remajaanak_id',
        'tanggal',
        'emosi',
        'catatan',
    ];

    public function remajaAnak()
    {
        return $this->belongsTo(RemajaAnak::class, 'remajaanak_id');
    }
}