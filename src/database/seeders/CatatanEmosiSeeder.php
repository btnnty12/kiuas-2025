<?php

namespace Database\Seeders;

use App\Models\CatatanEmosi;
use Illuminate\Database\Seeder;

class CatatanEmosiSeeder extends Seeder
{
    public function run(): void
    {
        CatatanEmosi::create([
            'remaja_anak_id' => 1,
            'tanggal' => now(),
            'emosi' => 'cemas',
            'catatan' => 'Terlihat gelisah dan tidak fokus saat belajar.',
        ]);
    }
}