<div>
    <x-tabla titulo="Usuarios" buscador excel="excelUsuarios" pdf paginado="perPageUsuarios">
        <x-slot name="cabeceras">
            {{-- Name --}}
            <th>
                <x-adminlte-input name="" wire:model.live.debounce.250ms="buscarName" label="Nombre"
                    igroup-size="sm" />
            </th>

            {{-- Usuario --}}
            <th>
                <x-adminlte-input name="" wire:model.live.debounce.250ms="buscarUsuario" label="Usuario"
                    igroup-size="sm" />
            </th>

            {{-- Email --}}
            <th>
                <x-adminlte-input name="" wire:model.live.debounce.250ms="buscarEmail" label="Email"
                    igroup-size="sm" />
            </th>

            {{-- Activo --}}
            <th>
                <x-adminlte-select name="" wire:model.live.debounce.250ms="buscarActivo" label="Activo"
                    igroup-size="sm">
                    <option value="">-- Todos --</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </x-adminlte-select>
            </th>
            <th>Acciones</th>
        </x-slot>

        @forelse ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name ?? 'S/D' }}</td>
                <td>{{ $usuario->usuario ?? 'S/D' }}</td>
                <td>{{ $usuario->email ?? 'S/D' }}</td>
                <td>{{ $usuario->activo ?? 'S/D' }}</td>
                <td>{{ $usuario->ultimo_acceso ?? 'S/D' }}</td>
                <td>
                    <button class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @empty
            <td colspan="100%" class="text-center text-muted">Sin resultados coincidentes...</td>
        @endforelse

        <x-slot name="paginacion">
            {{ $usuarios->links() }}
        </x-slot>
    </x-tabla>
</div>
