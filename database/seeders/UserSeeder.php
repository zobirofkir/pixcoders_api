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
            "role" => RolesEnum::ADMIN->value,

            "skills" => ["React", "Next.js", "Node.js", "UI Design"],
            "phone" => "+212 600 123 456",
            "website" => "https://pixcoders.com",
            "social" => [
                "github" => "pixcoders",
                "linkedin" => "pix-coders",
                "twitter" => "pix_coders"
            ],
        ]);

        $admin->assignRole(RolesEnum::ADMIN->value);
    }
}
