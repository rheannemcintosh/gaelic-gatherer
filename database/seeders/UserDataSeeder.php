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
     * Run the database seeds.
     */
    public function run(): void
    {
        UserData::factory()->count(10000)->create();
    }
}
