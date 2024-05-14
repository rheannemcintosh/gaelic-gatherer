<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badges')->insert([
            'name' => 'Gaelic Gatherer',
            'description' => 'Collect all Badges'
        ]);

        DB::table('badges')->insert([
            'name' => 'Highlander Hello',
            'description' => 'Complete the Scottish Gaelic Greetings Unit'
        ]);

        DB::table('badges')->insert([
            'name' => 'Admirable Alba',
            'description' => 'Complete the Scottish Places Unit'
        ]);

        DB::table('badges')->insert([
            'name' => 'Dreich Detective',
            'description' => 'Complete the Weather Unit'
        ]);

        DB::table('badges')->insert([
            'name' => 'Super Shortbread',
            'description' => 'Complete the Food & Drink Unit'
        ]);

        DB::table('badges')->insert([
            'name' => 'Affa Amazing',
            'description' => 'Complete the Alphabet Unit'
        ]);

        DB::table('badges')->insert([
            'name' => 'Celtic Connoisseur',
            'description' => 'Complete all the Mandatory Overview Lessons'
        ]);

        DB::table('badges')->insert([
            'name' => 'Brave Bobby',
            'description' => 'Spend Five Minutes Learning'
        ]);

        DB::table('badges')->insert([
            'name' => 'Happy Haggis',
            'description' => 'Spend Thirty Minutes Learning'
        ]);

        DB::table('badges')->insert([
            'name' => 'Brilliant Bagpipes',
            'description' => 'Complete One Lesson'
        ]);

        DB::table('badges')->insert([
            'name' => 'Kingly Kilt',
            'description' => 'Complete Five Lessons'
        ]);

        DB::table('badges')->insert([
            'name' => 'Terrific Terrier',
            'description' => 'Complete Ten Lessons'
        ]);

        DB::table('badges')->insert([
            'name' => 'Unit Unicorn',
            'description' => 'Complete all Units'
        ]);

        DB::table('badges')->insert([
            'name' => 'Rabbie Reader',
            'description' => 'Complete a Reading Lesson'
        ]);

        DB::table('badges')->insert([
            'name' => 'Noble Nessie',
            'description' => 'Complete a Map Based Lesson'
        ]);

        DB::table('badges')->insert([
            'name' => 'Wonder Wallace',
            'description' => 'Complete a Word Matching Lesson'
        ]);

        DB::table('badges')->insert([
            'name' => 'Talented Thistle',
            'description' => 'Complete a Translation Lesson'
        ]);

        DB::table('badges')->insert([
            'name' => 'Ceilidh Conqueror',
            'description' => 'Complete a ????? Lesson'
        ]);

        DB::table('badges')->insert([
            'name' => 'Knowing Kelpie',
            'description' => 'Complete the course'
        ]);

        DB::table('badges')->insert([
            'name' => 'Perfect Piper',
            'description' => 'Achieve a perfect score in the practice quiz'
        ]);
    }
}
