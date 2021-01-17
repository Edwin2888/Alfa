<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'BOGOTA',
        ]);
        City::create([
            'name' => 'CALI',
        ]);
        City::create([
            'name' => 'SOACHA',
        ]);
        City::create([
            'name' => 'ARMENRIA',
        ]);
        City::create([
            'name' => 'IBAGUE',
        ]);
        City::create([
            'name' => 'PEREIRA',
        ]);
        City::create([
            'name' => 'CARTAGENA',
        ]);
    }
}
