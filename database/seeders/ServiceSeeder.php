<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'service_code' => 'SRV-20260116-001',
                'vehicle_id' => 1,
                'technician_id' => 1,
                'service_date' => now()->subDays(5),
                'service_type' => 'Ganti Oli',
                'status' => 'done',
                'created_by' => 1,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'service_code' => 'SRV-20260116-002',
                'vehicle_id' => 2,
                'technician_id' => 2,
                'service_date' => now()->subDays(4),
                'service_type' => 'Service Berkala',
                'status' => 'done',
                'created_by' => 1,
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'service_code' => 'SRV-20260116-003',
                'vehicle_id' => 3,
                'technician_id' => 3,
                'service_date' => now()->subDays(3),
                'service_type' => 'Ganti Rem',
                'status' => 'done',
                'created_by' => 1,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'service_code' => 'SRV-20260116-004',
                'vehicle_id' => 4,
                'technician_id' => 1,
                'service_date' => now()->subDays(2),
                'service_type' => 'Ganti Filter Udara',
                'status' => 'done',
                'created_by' => 1,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'service_code' => 'SRV-20260116-005',
                'vehicle_id' => 5,
                'technician_id' => 2,
                'service_date' => now()->subDays(1),
                'service_type' => 'Service Elektrik',
                'status' => 'pending',
                'created_by' => 1,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'service_code' => 'SRV-20260116-006',
                'vehicle_id' => 1,
                'technician_id' => 3,
                'service_date' => now(),
                'service_type' => 'Ganti Kampas Kopling',
                'status' => 'pending',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
