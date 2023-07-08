<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use Illuminate\Support\Str;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'name'=>"Lexus GLk",
                'model'=>"GLK Series",
                'image'=>'lexus.jpeg',
                'description'=>"A rugged car"
            ],
            [
                'name'=>"Lexus Prime",
                'model'=>"GLS 200",
                'image'=>'lexus_again.jpeg',
                'description'=>"A rugged car indeed"
            ],
            [
                'name'=>"Ferrari",
                'model'=>"Ferri 300",
                'image'=>'random.jpeg',
                'description'=>"Finest car",
                'status'=>"Needs repair"
            ],
            [
                'name'=>"BMW",
                'model'=>"Desert Storm",
                'image'=>'desert_storm.jpeg',
                'description'=>"Reliable and mad"
            ]
        ];

        foreach($vehicles as $vehicle){
            Vehicle::create([
                'name' => $vehicle['name'],
                'model' => $vehicle['model'],
                'image' => $vehicle['image'],
                'description' => $vehicle['description'],
                'status' => $vehicle['status'] ?? null,
            ]);
        }
    }
}
