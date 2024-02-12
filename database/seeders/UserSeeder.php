<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 🔽 2行追加
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 🔽 3ユーザ作成する
        User::create([
            'name' => 'a-taro',
            'email' => 'a-taro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'b-taro',
            'email' => 'b-taro@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'c-taro',
            'email' => 'c-taro@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
