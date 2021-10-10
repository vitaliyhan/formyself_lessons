<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Category::factory()->create(['title'=>'Путешествия']);
         \App\Models\Category::factory()->create(['title'=>'Кино']);
    }
}
