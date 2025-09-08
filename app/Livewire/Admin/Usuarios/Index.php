<?php

namespace App\Livewire\Admin\Usuarios;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $buscador = '';
    public $buscarName = '';
    public $buscarUsuario = '';
    public $buscarEmail = '';
    public $buscarActivo = '';
    public $paginado = 5;

    // Limpiar el buscador y la paginación al cambiar de pagina
    public function updating($key): void
    {
        if (in_array($key, [
            'buscador',
            'buscarName',
            'buscarUsuario',
            'buscarEmail',
            'buscarActivo',
            'paginado',
        ])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.admin.usuarios.index', [
            'usuarios' => User::buscador($this->buscador)
                ->buscarName($this->buscarName)
                ->buscarUsuario($this->buscarUsuario)
                ->buscarEmail($this->buscarEmail)
                ->buscarActivo($this->buscarActivo)
                ->paginate($this->paginado)
        ]);
    }
}
