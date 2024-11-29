<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Guru::create([
        //     'nama' => 'Guru Admin',
        //     'email' => 'guruadmin@example.com',
        //     'password' => Hash::make('password123'),
        //     'kelas_id' => 1,
        // ]);
    }
}
