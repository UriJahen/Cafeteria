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

        $apiKey = config('services.openweather.key');
        $ciudad = "Cuernavaca";
        $datos = null;
        $comidaRecomendada = null;
        $motivoRecomendacion = "";
        $temperatura = null;

        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $ciudad,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'es'
            ]);

            if ($response->successful()) {
                $datos = $response->json();
                $temperatura = $datos['main']['temp'];

                $query = comida::query();

                if ($temperatura < 20) {
                    $query->where('clima', 'caliente');
                    $motivoRecomendacion = "Hoy hace frío, te sugerimos algo caliente.";
                } elseif ($temperatura > 30) {
                    $query->where('clima', 'frio');
                    $motivoRecomendacion = "Hoy hace calor, te sugerimos algo fresco.";
                } else {
                    $motivoRecomendacion = "El clima es templado, cualquier opción es buena.";
                }

                $comidaRecomendada = $query->inRandomOrder()->first();

                if (!$comidaRecomendada) {
                    $comidaRecomendada = comida::inRandomOrder()->first();
                }
            }
        } catch (\Exception $e) {
            // opcional: log
        }

        return view('comida.index', compact(
            'comida',
            'datos',
            'comidaRecomendada',
            'motivoRecomendacion',
            'temperatura'
        ));
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



}