<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++){
            $data = [
                'name' => $faker->name,
                'description' => $faker->description,
                'image' => $faker->image('public/images/admin/sliders', 400, 300, null, false),
            ];
            DB::table('sliders')->insert($data);
        }
    }
}
