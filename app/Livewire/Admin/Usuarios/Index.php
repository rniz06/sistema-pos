<?php

namespace App\Livewire\Admin\Usuarios;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.usuarios.index', [
            'usuarios' => User::paginate(5, ['*'], 'a_page')
        ]);
    }
}
