<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') - {{ config('app.name') }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #222; }
        header { background: #1f3a5f; color: #fff; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; }
        header form { margin: 0; display: flex; gap: 12px; align-items: center; }
        main { max-width: 960px; margin: 24px auto; padding: 0 16px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ccd; padding: 8px; text-align: left; }
        th { background: #1f3a5f; color: #fff; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button, .boton { background: #1f3a5f; color: #fff; border: 0; padding: 8px 14px; cursor: pointer; text-decoration: none; display: inline-block; font-size: 14px; }
        .exito { background: #d4edda; border: 1px solid #28a745; padding: 10px; margin-bottom: 12px; }
        .error { color: #b00020; margin: 4px 0 0; }
        .vacio { text-align: center; color: #666; }
    </style>
</head>
<body>
    <header>
        <strong>{{ config('app.name') }}</strong>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <span>Usuario: {{ auth()->user()->usuario }}</span>
                <button type="submit">Cerrar sesión</button>
            </form>
        @endauth
    </header>

    <main>
        @if (session('exito'))
            <div class="exito">{{ session('exito') }}</div>
        @endif

        @yield('contenido')
    </main>
</body>
</html>