<?php

namespace Database\Seeders;

use App\Models\DataDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataDriver::create([
            'nik' => 1234567890123456,
            'foto' => 'string.jpg',
            'nama' => 'Samsudin',
            'email' => 'samsudin@gmail.com',
            'phone' => '08123456789'
        ]);
    }
}
