<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\Models;
use App\Models\Color;
use App\Models\Dealership;

class VehiclesTableSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have Make, Model, Color, and Dealership records in your database

        $makes = Make::all();
        $models = Models::all();
        $colors = Color::all();
        $dealerships = Dealership::all();

        for ($i = 1; $i <= 10; $i++) {
            Vehicle::create([
                'title' => "Vehicle $i",
                'make' => $makes->random()->id,
                'model' => $models->random()->id,
                'color' => $colors->random()->id,
                'drive_type' => 'Automatic',
                'transmission' => 'Automatic',
                'condition' => 'New',
                'year' => '2023',
                'mileage' => '1000 miles',
                'fuel_type' => 'Gasoline',
                'engine_size' => '2.0L',
                'doors' => '4',
                'cylinders' => '6',
                'VIN' => 'ABC123XYZ456',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'price' => '25000',
                'stock_id' => 'STOCK123',
                'discount' => '500',
                'is_featured' => rand(0, 1),
                'featured_from_date' => Carbon::now()->subDays(5),
                'featured_to_date' => Carbon::now()->addDays(5),
                'dealership_id' => $dealerships->random()->id,
                'is_sold' => rand(0, 1),
                'is_enabled' => true,
                'reviews' => 'Good vehicle',
                'rating' => '4.5',
            ]);
        }
    }
}
