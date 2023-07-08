<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Driver;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //Client::inRandomOrder()->first()->id
        $service = ['Pick Up', "Hook Up", "Special Delivery", "Official Deliver", "Coded Heist", "The Transporter", "Black Market"];

        $startDate = $this->faker->dateTimeThisYear();

        $endDate = carbon($startDate)->addDays(random_int(1, 4));

        return [
            'service' => Arr::random($service),
            'client_id' => Client::inRandomOrder()->first()->id,
            'driver_id' => Driver::inRandomOrder()->first()->id,
            'vehicle_id' => Vehicle::inRandomOrder()->first()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'pickup_location' => $this->faker->address(),
            'drop_off_location' => $this->faker->address(),
        ];
    }
}
