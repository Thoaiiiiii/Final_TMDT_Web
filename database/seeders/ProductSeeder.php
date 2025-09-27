<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB:table('products')->insert([
                'name' => $faker->word(4, true),
                'price' => $faker->randomFloat(2, 50, 1000),
                'image' => 'https://loremflickr.com/400/400/shoes?random=' . $i,
                'category_id' => rand(1, 5),
            ]);
        }
    }
}
