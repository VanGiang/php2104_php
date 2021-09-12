<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker\Factory::create();
        for ($i=0; $i <100 ; $i++) { 
            $data[] = [
                'name' => $faker->name,
                'category_id' => rand(1, 900),
                'user_id' => rand(1, 900),
                'sold_cnt' => rand(1, 100),
                'price' => rand(100, 900),
                'quality' => rand(1, 100),
                'image' => $faker->imageUrl(200, 200), 
                'discreption' => $faker->text(20),
                'rate' => rand(0,5),
                'is_public' => 1,
                'sale_off' => rand(0,5),
            ];      
        }

        DB::table('products')->insert($data);
    }
}

