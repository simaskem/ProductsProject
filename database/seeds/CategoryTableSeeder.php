<?php

use Illuminate\Database\Seeder;
use App\Category as Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 4)->create()->each(function($u) {
            $u->products()->saveMany(factory(App\Product::class, 3)->create([
                'category_id' => $u->id,
           ]));
        });
    }
}
