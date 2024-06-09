<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds for the badges table, to add the 20 available badges.
     */
    public function run(): void
    {
        DB::table('badges')->insert([
            'name'        => 'Shortbread Starter',
            'description' => 'Start the Study',
            'icon'        => 'shortbread-starter.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Brave Bobby',
            'description' => 'Complete 1 Lesson',
            'icon'        => 'brave-bobby.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Knowing Kelpie',
            'description' => 'Complete 10 Lessons',
            'icon'        => 'knowing-kelpie.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Remarkable Rabbie',
            'description' => 'Complete a Reading Lesson',
            'icon'        => 'remarkable-rabbie.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Magnificent Munro',
            'description' => 'Complete a Matching Lesson',
            'icon'        => 'magnificent-munro.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Talented Thistle',
            'description' => 'Complete an Icon Lesson',
            'icon'        => 'talented-thistle.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Celtic Connoisseur',
            'description' => 'Complete a Calculations Lesson',
            'icon'        => 'celtic-connoisseur.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Brilliant Bagpipes',
            'description' => 'Spend 5 Minutes Learning',
            'icon'        => 'brilliant-bagpipes.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Terrific Terrier',
            'description' => 'Spend 30 Minutes Learning',
            'icon'        => 'terrific-terrier.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Highlander Hello',
            'description' => 'Complete the Greetings Unit',
            'icon'        => 'highlander-hello.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Admirable Alba',
            'description' => 'Complete the Places Unit',
            'icon'        => 'admirable-alba.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Happy Haggis',
            'description' => 'Complete the Food & Drink Unit',
            'icon'        => 'happy-haggis.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Dreich Detective',
            'description' => 'Complete the Weather Unit',
            'icon'        => 'dreich-detective.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Noble Nessie',
            'description' => 'Complete the Numbers Unit',
            'icon'        => 'noble-nessie.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Unit Unicorn',
            'description' => 'Complete all Units',
            'icon'        => 'unit-unicorn.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('badges')->insert([
            'name'        => 'Gaelic Gatherer',
            'description' => 'Collect all Badges',
            'icon'        => 'gaelic-gatherer.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
