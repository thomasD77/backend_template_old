<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RoleEmit extends Component
{
    public $role =  '#examplemodal';

    protected $listeners = [
        'emitRole',
    ];

    public function mount()
    {

    }


    public function emitRole($id){

        $this->role = $id;
        $this->dispatchBrowserEvent('closeModal', $id);
    }

    public function render()
    {
        $role = $this->role;
        return view('livewire.role-emit', compact('role'));
    }
}
