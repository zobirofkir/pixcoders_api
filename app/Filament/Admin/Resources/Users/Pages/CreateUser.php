<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Hash password
        if (isset($data['password']) && filled($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        return $data;
    }

    protected function afterCreate(): void
    {
        // Assign role to user
        $roleId = $this->form->getState()['role'];
        $role = Role::find($roleId);
        
        if ($role) {
            $this->record->assignRole($role->name);
        }
    }
}