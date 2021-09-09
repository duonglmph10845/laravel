<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
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
                'price' => $faker->randomNumber(6),
                'quantity' => $faker->randomNumber(2),
                'category_id' => $faker->numberBetween(1,10),
                'image' => $faker->image('public/images/admin/products', 400, 300, null, false),
            ];
            DB::table('products')->insert($data);
        }
    }
}
