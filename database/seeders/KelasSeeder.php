<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kelas')->insert([
            ['nama' => 'Kelas 1A'],
            ['nama' => 'Kelas 1B'],
            ['nama' => 'Kelas 2A'],
            ['nama' => 'Kelas 2B'],
            ['nama' => 'Kelas 3A'],
            ['nama' => 'Kelas 3B'],
        ]);
    }
}
