<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Control de gastos</title>

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            background: #f8f1e8;
            color: #382b25;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        main {
            width: min(90%, 500px);
            padding: 40px 24px;
            background: white;
            border-radius: 16px;
        }

        h1 {
            color: #9a4f32;
        }

        a {
            display: inline-block;
            margin-top: 18px;
            padding: 13px 22px;
            border-radius: 8px;
            background: #9a4f32;
            color: white;
            text-decoration: none;
        }

        a:hover {
            background: #783d27;
        }
    </style>
</head>
<body>
    <main>
        <h1>Control de gastos</h1>
        <p>Registra tus gastos y mantén tus cuentas organizadas.</p>

        <a href="{{ route('gastos.index') }}">Iniciar gastos</a>
    </main>
</body>
</html>