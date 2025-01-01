<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalLapangan;

class JadwalLapanganSeeder extends Seeder
{
    public function run()
    {
        $jam = [
            '08:00', '09:00', '10:00', '11:00', '12:00',
            '13:00', '14:00', '15:00', '16:00', '17:00',
            '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'
        ];

        foreach ($jam as $item) {
            JadwalLapangan::create([
                'id_lapangan' => 1, // ID lapangan
                'tanggal' => now()->toDateString(), // Default tanggal
                'jam' => $item,
                'status' => 'kosong',
            ]);
        }
    }
}
