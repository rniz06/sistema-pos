<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabla extends Component
{
    public string $titulo;
    public ?string $buscador;
    public ?string $excel;
    public ?string $pdf;
    public ?string $paginado;
    public $paginacion;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $titulo = 'Tabla',
        string $buscador = null,
        string $excel = null,
        string $pdf = null,
        string $paginado = 'perPage',
        $paginacion = null
    ) {
        $this->titulo = $titulo;
        $this->buscador = $buscador;
        $this->excel = $excel;
        $this->pdf = $pdf;
        $this->paginado = $paginado;
        $this->paginacion = $paginacion;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tabla');
    }
}
