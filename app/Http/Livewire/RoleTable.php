<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class RoleTable extends Component
{
    public $role;

    protected $listeners = [
        'updateRolesTable',
    ];

    public function updateRolesTable($name)
    {
        $this->role = $name;
    }

    public function render()
    {
        $roles = Role::all();
        $role = $this->role;
        return view('livewire.role-table', compact('role', 'roles'));
    }
}
