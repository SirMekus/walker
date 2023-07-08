<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companies = ['Dangote', "Capital Oil and Gas", "Bua", "Focados", "Shell", "Chevron"];
        
        return [
            'name' => [
                'firstname'=>$this->faker->firstName,
                'lastname'=>$this->faker->lastName
            ],
            'company' => Arr::random($companies),
        ];
    }
}
