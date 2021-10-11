<?php

namespace Database\Seeders;

use App\Models\Category;
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
        \App\Models\User::factory()->create(['email' => 'love-vitaliy@ya.ru', 'password' => bcrypt('123'), 'is_admin'=>true]);
        \App\Models\User::factory()->create(['email' => 'user@ya.ru', 'password' => bcrypt('123')]);
        $this->call([
            CategorySeed::class,
            TagSeed::class
        ]);
    }
}
