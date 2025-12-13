<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Pix Coders',
            'email' => 'admin@pixcoders.com',
            'password' => 'pixcoders123@@@',
        ]);

        $user->assignRole('admin');
    }
}
