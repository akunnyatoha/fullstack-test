<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Admin Nobar App",
                "email" => "admin1@email.com",
                "password" => Hash::make("adminsatu")
            ],
            [
                "name" => "Admin2 Nobar App",
                "email" => "admin2@email.com",
                "password" => Hash::make("admindua")
            ],
            [
                "name" => "Admin3 Nobar App",
                "email" => "admin3@email.com",
                "password" => Hash::make("admintiga")
            ]
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
