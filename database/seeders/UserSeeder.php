<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'name_kanji' => '山田太郎',
                'name_kana' => 'ヤマダタロウ',
                'password' => 'password123',
                'company_id' => 1,
            ]
        );
    }
}
