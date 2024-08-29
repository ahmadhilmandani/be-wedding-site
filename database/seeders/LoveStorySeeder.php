<?php

namespace Database\Seeders;

use App\Models\LoveStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoveStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoveStory::factory()->count(10)->create();
    }
}
