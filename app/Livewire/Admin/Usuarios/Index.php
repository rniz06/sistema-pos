<?php

namespace App\Livewire\Admin\Usuarios;

use App\Exports\Excel\Admin\Usuarios\ExcelListadoUsuarios;
use App\Exports\ExcelGenericoExport;
use App\Exports\Pdf\Admin\Usuarios\PdfListadoUsuarios;
use App\Exports\PdfGenericoExport;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

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

    public function cargarDatosParaExpotar()
    {
        return User::select('name', 'usuario', 'email', 'activo', 'ultimo_acceso')->buscador($this->buscador)
            ->buscarName($this->buscarName)
            ->buscarUsuario($this->buscarUsuario)
            ->buscarEmail($this->buscarEmail)
            ->buscarActivo($this->buscarActivo)
            ->orderBy('name')
            ->get();
    }

    public function excel()
    {
        $datos = $this->cargarDatosParaExpotar();
        $encabezados = ['Nombre', 'Usuario', 'Email', 'Activo', 'Ultimo Acceso'];

        return Excel::download(new ExcelListadoUsuarios($datos, $encabezados), 'Listado de Usuarios.xlsx');
    }

    public function pdf()
    {
        $nombre_archivo = "Listado de Usuarios";
        $datos = $this->cargarDatosParaExpotar();
        $encabezados = ['Nombre', 'Usuario', 'Email', 'Activo', 'Ultimo Acceso'];

        return (new PdfListadoUsuarios($datos, $encabezados, $nombre_archivo))->download();
    }
}
