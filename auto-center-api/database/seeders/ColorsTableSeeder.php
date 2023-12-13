<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Color::create([
                'title' => "Color $i",
                'name' => "ColorName$i",
                'code' => "ColorCode$i",
            ]);
        }
    }
}
