<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        Sale::firstOrCreate([
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
        ]);
    }
}
