<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@bioskop.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. 15 Data Dummy Penonton Secara Manual
        $penontonList = [
            ['name' => 'Ahmad Fauzi', 'email' => 'ahmad@gmail.com'],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti@gmail.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi@gmail.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@gmail.com'],
            ['name' => 'Eko Prasetyo', 'email' => 'eko@gmail.com'],
            ['name' => 'Fitri Handayani', 'email' => 'fitri@gmail.com'],
            ['name' => 'Gilang Ramadhan', 'email' => 'gilang@gmail.com'],
            ['name' => 'Hesti Wulandari', 'email' => 'hesti@gmail.com'],
            ['name' => 'Irfan Hakim', 'email' => 'irfan@gmail.com'],
            ['name' => 'Joko Widodo', 'email' => 'joko@gmail.com'],
            ['name' => 'Kartika Putri', 'email' => 'kartika@gmail.com'],
            ['name' => 'Lukman Hakim', 'email' => 'lukman@gmail.com'],
            ['name' => 'Maya Sofa', 'email' => 'maya@gmail.com'],
            ['name' => 'Nugroho Adi', 'email' => 'nugroho@gmail.com'],
            ['name' => 'Putri Ariani', 'email' => 'putri@gmail.com'],
        ];

        foreach ($penontonList as $p) {
            User::create([
                'name' => $p['name'],
                'email' => $p['email'],
                'password' => Hash::make('password123'),
                'role' => 'penonton',
            ]);
        }
    }
}