<?php

namespace Database\Seeders;

use App\Models\Marriage;
use Illuminate\Database\Seeder;

class MarriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marriage::factory()->count(10)->create();
    }
}
