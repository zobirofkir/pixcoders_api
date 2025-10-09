<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\RolesEnum;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RolesEnum::cases() as $role) {
            Role::updateOrCreate(
                ['name' => $role->value]
            );
        }
    }
}
