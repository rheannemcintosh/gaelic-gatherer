<?php

namespace Database\Seeders;

use App\Helpers\StudyGroupHelper;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds for the users table, to test whether the study groups are being generated randomly.
     * NOTE: This seed is only for testing purposes and should not be used in production.
     */
    public function run(): void
    {
        UserData::factory()->count(10000)->create();
    }
}
