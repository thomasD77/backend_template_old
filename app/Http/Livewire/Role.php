<?php

namespace App\Http\Livewire;

use http\Env\Request;
use Livewire\Component;

class Role extends Component
{
    public $name;


    public function submit(Request $request)
    {
        dd($request);
        $this->name = $request->name;
        dd($this->name);

        \App\Models\Role::create([
            'name' => $this->name,

        ]);

    }
    public function render()
    {
        return view('livewire.role');
    }
}
