<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RemajaAnak;

class RemajaAnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Remaja::create([
            'nama' => 'Aldi Saputra',
            'usia' => 15,
            'jenis_kelamin' => 'Laki-laki',
            'tingkat_stres' => 6,
            'tingkat_kecemasan' => 7,
            'catatan' => 'Sering menunjukkan tanda kecemasan sebelum ujian.',
        ]);
    }
}
