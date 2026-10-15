<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de gastos</title>

    <style>
        body {
            margin: 0;
            padding: 40px 20px;
            background: #f8f1e8;
            color: #382b25;
            font-family: Arial, sans-serif;
        }

        main {
            max-width: 850px;
            margin: auto;
        }

        h1 {
            color: #9a4f32;
        }

        section {
            margin-top: 24px;
            padding: 24px;
            background: white;
            border-radius: 12px;
        }

        label {
            display: block;
            margin-top: 14px;
        }

        input, button {
            box-sizing: border-box;
            width: 100%;
            margin-top: 6px;
            padding: 11px;
            border: 1px solid #d8c9bb;
            border-radius: 7px;
            font: inherit;
        }

        button {
            margin-top: 18px;
            background: #9a4f32;
            color: white;
            border: 0;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 14px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #eadfd5;
            text-align: left;
        }

        .mensaje {
            padding: 12px;
            background: #e5f4e5;
            border-radius: 7px;
        }

        .error {
            color: #a32626;
        }
    </style>
</head>
<body>
    <main>
        <h1>Control de gastos</h1>
        <p>Registra tus gastos y consulta los que ya guardaste.</p>

        @if (session('mensaje'))
            <p class="mensaje">{{ session('mensaje') }}</p>
        @endif

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <section>
            <h2>Registrar gasto</h2>

            <form action="{{ route('gastos.store') }}" method="POST">
                @csrf

                <label for="descripcion">Descripción</label>
                <input
                    id="descripcion"
                    name="descripcion"
                    type="text"
                    value="{{ old('descripcion') }}"
                    required
                >

                <label for="monto">Monto</label>
                <input
                    id="monto"
                    name="monto"
                    type="number"
                    step="0.01"
                    min="0.01"
                    value="{{ old('monto') }}"
                    required
                >

                <label for="fecha">Fecha</label>
                <input
                    id="fecha"
                    name="fecha"
                    type="date"
                    value="{{ old('fecha', date('Y-m-d')) }}"
                    required
                >

                <button type="submit">Guardar gasto</button>
            </form>
        </section>

        <section>
            <h2>Gastos registrados</h2>

            <table>
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gastos as $gasto)
                        <tr>
                            <td>{{ $gasto->descripcion }}</td>
                            <td>${{ number_format($gasto->monto, 2) }}</td>
                            <td>{{ $gasto->fecha }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Todavía no hay gastos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>