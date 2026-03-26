<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comida;

class comidaController extends Controller
{
    public function index()
    {
        $comida = comida::all();
        return view('comida.index', compact('comida'));
    }

    public function create()
    {
        return view('comida.create');
    }

    public function store(Request $request)
    {
        comida::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
        ]);

        return redirect()->route("comida.index");
    }

    public function edit(comida $comida)
    {
        return view('comida.edit', compact('comida'));
    }

    public function update(Request $request, comida $comida)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'precio' => 'required',
        ]);

        $comida->update($request->all());

        
        return redirect()->route('comida.index')->with('success', 'Comida actualizada con éxito');
    }

    public function destroy(comida $comida)
    {
        $comida->delete();
        return redirect()->route('comida.index')->with('success', 'Comida eliminada con éxito');
    }
}
