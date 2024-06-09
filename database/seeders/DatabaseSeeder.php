<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run all seeds when the command php artisan db:seed is run.
     */
    public function run(): void
    {
        $this->call([
            UnitSeeder::class,
            LessonTypeSeeder::class,
            LessonSeeder::class,
            BadgeSeeder::class,
        ]);
    }
}
