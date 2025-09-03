<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">
            {{ $titulo }}
        </h3>

        <div class="d-flex align-items-center">
            {{-- Botones adicionales --}}
            @isset($headerBotones)
                <div class="mr-2">
                    {{ $headerBotones }}
                </div>
            @endisset

            {{-- Botones exportación --}}
            @if($excel)
                <button class="btn btn-sm btn-outline-success mr-1" wire:click="{{ $excel }}">
                    <i class="fas fa-file-excel"></i> Excel
                </button>
            @endif

            @if($pdf)
                <button class="btn btn-sm btn-outline-secondary mr-1" wire:click="{{ $pdf }}">
                    <i class="fas fa-file-pdf"></i> PDF
                </button>
            @endif

            {{-- Buscador --}}
            @if($buscador)
                <div class="input-group input-group-sm" style="width: 180px;">
                    <input type="text" class="form-control" placeholder="Buscar..."
                        wire:model.live="{{ $buscador }}">

                    <div class="input-group-append">
                        <button type="button" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="card-body table-responsive p-1">
        <table class="table table-bordered table-hover table-striped mb-0">
            <thead>
                <tr>
                    {{ $cabeceras }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>

    @if($paginacion)
        <div class="card-footer clearfix d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                <select class="form-control form-control-sm"
                        style="width: 80px; display:inline-block;"
                        wire:model.live="{{ $paginado }}">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <small>Por página</small>
            </div>
            <div>
                {{ $paginacion }}
            </div>
        </div>
    @endif
</div>