<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Characteristic;

class CharacteristicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Characteristic::factory()->count(180)->create();
    }
}
