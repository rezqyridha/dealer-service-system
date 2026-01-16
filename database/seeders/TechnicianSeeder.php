<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Seeder;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technician::insert([
            ['name' => 'Budi', 'phone' => '08123456789'],
            ['name' => 'Andi', 'phone' => '08234567890'],
            ['name' => 'Slamet', 'phone' => '08345678901'],
        ]);
    }
}
