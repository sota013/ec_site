<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::firstOrCreate(
            ['product_name' => 'サンプル商品'],
            [
                'user_id' => 1,
                'company_id' => 1,
                'price' => 1000,
                'stock' => 10,
                'description' => 'これはテスト用の商品です。',
                'img_path' => 'products/sample.jpg',
            ]
        );
    }
}
