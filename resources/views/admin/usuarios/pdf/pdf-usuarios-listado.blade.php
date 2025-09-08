<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $nombre_archivo ?? 'Documento' }}</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf/pdf-general.css') }}">
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #999;
            padding: 4px 6px;
            text-align: left;
        }

        th {
            background-color: #e0e0e0;
        }

        .center {
            text-align: center;
        }
    </style> --}}
</head>

<body>
    <h2>{{ $nombre_archivo ?? 'Documento' }}</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Activo</th>
                <th>Ultimo Acceso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $usuario)
                <tr>{{ $usuario->name ?? 'S/D' }}</tr>
                <tr>{{ $usuario->usuario ?? 'S/D' }}</tr>
                <tr>{{ $usuario->email ?? 'S/D' }}</tr>
                <tr>{{ $usuario->activo ? 'SI' : 'NO' }}</tr>
                <tr>{{ !empty($usuario->ultimo_acceso) ? date('d/m/Y H:i:s', strtotime($usuario->ultimo_acceso)) : 'S/D' }}</tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
