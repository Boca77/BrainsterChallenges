<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));


        return [
            'brand' => $faker->vehicleBrand,
            'model' => $faker->vehicleModel,
            'plate_number' => $faker->vehicleRegistration,
            'insurance_date' => $faker->date(),
        ];
    }
}
