<?php

namespace Database\Factories;

use App\Models\Technician;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_code' => 'SVC-' . $this->faker->unique()->numberBetween(1000, 9999),
            'vehicle_id' => Vehicle::factory(),
            'technician_id' => Technician::factory(),
            'service_date' => $this->faker->dateTime(),
            'service_type' => $this->faker->word(),
            'status' => $this->faker->randomElement(['pending', 'done']),
            'created_by' => User::factory(),
        ];
    }
}
