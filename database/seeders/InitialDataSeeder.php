<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create superadmin
        Pengguna::firstOrCreate(
            ['username' => 'superadmin'],
            [
                'nama' => 'Super Administrator',
                'email' => 'superadmin@futsalbooking.com',
                'password' => 'SuperAdmin123!',
                'role' => 'superadmin',
                'no_hp' => '081234567890',
                'tanggal_lahir' => '1990-01-01',
            ]
        );

        // Create admin
        Pengguna::firstOrCreate(
            ['username' => 'admin'],
            [
                'nama' => 'Administrator',
                'email' => 'admin@futsalbooking.com',
                'password' => 'Admin123!',
                'role' => 'admin',
                'no_hp' => '081234567891',
                'tanggal_lahir' => '1992-01-01',
            ]
        );

        // Create sample customer
        Pengguna::firstOrCreate(
            ['username' => 'johndoe'],
            [
                'nama' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'Customer123!',
                'role' => 'customer',
                'no_hp' => '081234567892',
                'tanggal_lahir' => '1995-01-01',
            ]
        );

        // Create sample fields
        $lapangan = [
            [
                'nama_lapangan' => 'Lapangan A',
                'deskripsi' => 'Lapangan futsal standar dengan rumput sintetis berkualitas tinggi. Dilengkapi dengan pencahayaan LED yang terang dan sistem drainase yang baik.',
                'harga_per_jam' => 100000,
                'status' => 'tersedia',
                'foto' => null,
            ],
            [
                'nama_lapangan' => 'Lapangan B',
                'deskripsi' => 'Lapangan futsal premium dengan fasilitas lengkap. Tersedia ruang ganti, toilet, dan area parkir yang luas.',
                'harga_per_jam' => 120000,
                'status' => 'tersedia',
                'foto' => null,
            ],
            [
                'nama_lapangan' => 'Lapangan C',
                'deskripsi' => 'Lapangan futsal indoor dengan AC. Cocok untuk bermain di segala cuaca dengan kenyamanan maksimal.',
                'harga_per_jam' => 150000,
                'status' => 'tersedia',
                'foto' => null,
            ],
            [
                'nama_lapangan' => 'Lapangan D',
                'deskripsi' => 'Lapangan futsal outdoor dengan view yang indah. Dilengkapi dengan tribun untuk penonton.',
                'harga_per_jam' => 80000,
                'status' => 'tidak_tersedia',
                'foto' => null,
            ],
        ];

        foreach ($lapangan as $data) {
            Lapangan::firstOrCreate(
                ['nama_lapangan' => $data['nama_lapangan']],
                $data
            );
        }

        $this->command->info('Initial data seeded successfully!');
        $this->command->info('Login credentials:');
        $this->command->info('Superadmin - Username: superadmin, Password: SuperAdmin123!');
        $this->command->info('Admin - Username: admin, Password: Admin123!');
        $this->command->info('Customer - Username: johndoe, Password: Customer123!');
    }
}
