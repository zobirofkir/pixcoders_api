<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Handle password update - only hash if provided
        if (isset($data['password']) && filled($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Remove password from data if empty to avoid overwriting with null
            unset($data['password']);
        }

        return $data;
    }

    protected function afterSave(): void
    {
        // Sync role
        $roleId = $this->form->getState()['role'];
        $role = Role::find($roleId);

        if ($role) {
            $this->record->syncRoles([$role->name]);
        }
    }

    protected function fillForm(): void
    {
        $state = $this->record->toArray();

        // Add the role to form data - get the first role's ID
        $state['role'] = $this->record->roles->first()?->id;

        $this->form->fill($state);
    }
}
