<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       Category::factory()->count(6)->create();
       Product::factory()->count(22)->create();

       $categories = Category::all();
       Product::all()->each(function ($product) use ($categories){
            $product->categories()->attach(
                $categories->random(2)->pluck('id')->toArray()
            );
       }
    );
    }
}