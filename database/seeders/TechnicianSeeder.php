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
            [
                'name' => 'Budi',
                'phone' => '08123456789',
                'specialization' => 'Mesin & Transmisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andi',
                'phone' => '08234567890',
                'specialization' => 'Elektrik & Battery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Slamet',
                'phone' => '08345678901',
                'specialization' => 'AC & Pendingin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
