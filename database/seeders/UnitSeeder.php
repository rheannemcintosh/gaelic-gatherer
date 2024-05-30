<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Greetings Unit
        DB::table('units')->insert([
            'title' => 'Scottish Greetings',
            'description' => 'Learn how to greet people in Scottish Gaelic.',
            'slug' => 'greetings',
            'active' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Places Unit
        DB::table('units')->insert([
            'title' => 'Scottish Places',
            'description' => 'Learn about some of the most famous places in Scotland.',
            'slug' => 'places',
            'active' => true,
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Food & Drink Unit
        DB::table('units')->insert([
            'title' => 'Scottish Food & Drink',
            'description' => 'Learn about some of the most famous food and drink in Scotland.',
            'slug' => 'food-and-drink',
            'active' => true,
            'sort_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Weather Unit
        DB::table('units')->insert([
            'title' => 'Scottish Weather',
            'description' => 'Learn how to talk about the weather in Scottish Gaelic.',
            'slug' => 'weather',
            'active' => true,
            'sort_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Numbers Unit
        DB::table('units')->insert([
            'title' => 'Numbers',
            'description' => 'Learn how to count in Scottish Gaelic, from one to ten!',
            'slug' => 'numbers',
            'active' => true,
            'sort_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
