<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "name" => "Pix Coders",
            "email" => "admin@pixcoders.com",
            "password" => "pixcoders123@@@",
            "role" => "admin"
        ]);

        $admin->assignRole(RolesEnum::ADMIN->value);
    }
}
