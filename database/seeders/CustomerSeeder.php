<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert([
            [
                'name' => 'Bapak Joko',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 123, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ibu Siti',
                'phone' => '081345678901',
                'address' => 'Jl. Sudirman No. 456, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pak Hendra',
                'phone' => '081456789012',
                'address' => 'Jl. Ahmad Yani No. 789, Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ibu Ratna',
                'phone' => '081567890123',
                'address' => 'Jl. Diponegoro No. 321, Medan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
