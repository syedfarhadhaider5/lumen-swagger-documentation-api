<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Make;

class MakesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Make::create([
                'title' => "Make $i",
            ]);
        }
    }
}
