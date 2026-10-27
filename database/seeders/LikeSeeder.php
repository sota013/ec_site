<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        Like::firstOrCreate([
            'user_id' => 1,
            'product_id' => 1,
        ]);
    }
}
