<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::insert([
            [
                'customer_id' => 1,
                'plate_number' => 'B 1234 ABC',
                'model' => 'Mitsubishi Xpander',
                'year' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 1,
                'plate_number' => 'B 5678 XYZ',
                'model' => 'Mitsubishi Pajero',
                'year' => 2021,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'plate_number' => 'D 1111 AAA',
                'model' => 'Mitsubishi Outlander',
                'year' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3,
                'plate_number' => 'AB 2222 BBB',
                'model' => 'Mitsubishi Triton',
                'year' => 2020,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 4,
                'plate_number' => 'BK 3333 CCC',
                'model' => 'Mitsubishi Colt',
                'year' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
