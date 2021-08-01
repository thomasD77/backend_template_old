<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class RoleTable extends Component
{
    public $role;
    public $name;
    public $role_id;


    protected $listeners = [
        'updateRolesTable',
    ];

    public function updateRolesTable($name)
    {
        $this->role = $name;
    }

    public function removeRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    protected $rules = [
        'name' => 'required',
    ];

    public function submitFormRole($id)
    {

        $this->validate();

        $data = [
            'name' => $this->name,
        ];


        $role = Role::findOrFail($id);
        $role->name = $this->name;

        $role->update();

        $this->reset([
            'name',
        ]);

        $this->role_id = $id;

        Session::put('role_id', $id);
        $this->dispatchBrowserEvent('closeModal');
    }


    public function render()
    {
        $roles = Role::all();
        $role = $this->role;
        return view('livewire.role-table', compact('role', 'roles'));
    }
}
