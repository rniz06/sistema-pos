<div>
    <x-tabla 
    titulo="Usuarios"
    buscador="buscadorUsuarios"
    excel="exportUsuariosExcel"
    pdf="exportUsuariosPdf"
    paginado="perPageUsuarios"
    :paginacion="$usuarios->links()"
>
    <x-slot name="cabeceras">
        <th>ID</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Activo</th>
        <th>Ultimo Acceso</th>
        <th>Acciones</th>
    </x-slot>

    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->usuario }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->activo }}</td>
            <td>{{ $usuario->ultimo_acceso }}</td>
            <td>
                <button class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
    @endforeach
</x-tabla>
</div>
