<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'user_name' => 'admin',
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD'),
            'role' => 'admin'
        ];
        $data['password'] = Hash::make($data['password']);
        User::create($data);
    }
}