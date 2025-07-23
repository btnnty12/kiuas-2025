<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
    ];

    public function remajaAnaks()
    {
        return $this->hasMany(RemajaAnak::class);
    }

    public function aksesKuncis()
    {
        return $this->hasMany(AksesKunci::class);
    }
}