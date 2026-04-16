<?php

namespace App\Http\Controllers;

use App\Models\Pedido; 
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Ver la lista de pedidos
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.listado', compact('pedidos'));
    }

    // Mostrar el formulario para crear un pedido
    public function create()
    {
        return view('pedidos.CrearP');
    }

    // Guardar el nuevo pedido en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'mesa' => 'required',
            'platillo' => 'required',
            'cantidad' => 'required|integer',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente.');
    }

    // Mostrar el formulario para editar un pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.EditarP', compact('pedido'));
    }

    // Actualizar los datos del pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'mesa' => 'required',
            'platillo' => 'required',
            'cantidad' => 'required|integer',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
        return back()->with('error', 'Solo el administrador puede eliminar registros.');}

        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('warning', 'Pedido eliminado correctamente.');
    }
}
