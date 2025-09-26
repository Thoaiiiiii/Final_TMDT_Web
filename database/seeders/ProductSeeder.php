<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     */
    public function run(): void
    {
        Product::factory()
            ->count(50)
            ->create()
            ->each(function ($product) {
                // gan random category
                $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $product->categories()->attach($categories);
            });
    }
}
