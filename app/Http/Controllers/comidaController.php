<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comida;

use Illuminate\Support\Facades\Http;

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

        if (!auth()->user()->is_admin) {
        return back()->with('error', 'Solo el administrador puede eliminar registros.');}

        $comida->delete();
        return redirect()->route('comida.index')->with('success', 'Comida eliminada con éxito');
    }

    public function home()
    {
        $apiKey = config('services.openweather.key');
        $ciudad = "Jiutepec";

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $ciudad,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang' => 'es'
        ]);

        $datos = $response->json();

        return view('comida.sug', compact('datos'));
    }

}
