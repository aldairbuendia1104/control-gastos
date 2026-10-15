<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::orderBy('fecha', 'desc')->get();

        return view('gastos', compact('gastos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0.01',
            'fecha' => 'required|date',
        ]);

        Gasto::create($datos);

        return redirect()->route('gastos.index')
            ->with('mensaje', 'Gasto guardado correctamente.');
    }
}