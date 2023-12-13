<?php

namespace Database\Seeders;

use App\Models\Models;
use Illuminate\Database\Seeder;
use App\Models\Model;
use App\Models\Make;

class ModelsTableSeeder extends Seeder
{
    public function run()
    {
        $makes = Make::all();

        for ($i = 1; $i <= 10; $i++) {
            Models::create([
                'title' => "Model $i",
                'year' => "202$i",
                'make_id' => $makes->random()->id,
            ]);
        }
    }
}
