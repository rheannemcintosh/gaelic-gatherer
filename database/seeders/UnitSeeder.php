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
            'title' => 'Greetings',
            'description' => 'Learn how to greet people in Scottish Gaelic, such as saying hello and asking someone how they are!',
            'slug' => 'greetings',
            'active' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Places Unit
        DB::table('units')->insert([
            'title' => 'Places',
            'description' => 'Learn how to say the names of some places in Scottish Gaelic, from Aberdeen to England!',
            'slug' => 'places',
            'active' => true,
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Food & Drink Unit
        DB::table('units')->insert([
            'title' => 'Food & Drink',
            'description' => 'Learn how to talk about food and drink in Scottish Gaelic, such as haggis and whisky!',
            'slug' => 'food-and-drink',
            'active' => true,
            'sort_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create the Weather Unit
        DB::table('units')->insert([
            'title' => 'Weather',
            'description' => 'Learn how to talk about the weather in Scottish Gaelic, whether it is rainy, foggy or windy!',
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
