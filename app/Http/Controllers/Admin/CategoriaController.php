<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=Categoria::orderBy("id")->get();
        return view('admin.categoria.index',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.categoria.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'categoria' => 'required'
        ]);
        $items = new Categoria;
        $items->nombre_cat = $request->categoria;
        $items->save();
        return back()->with('mensaje', 'Se ha agregado una nueva llamda '.$request->item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seleccionar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $item=Categoria::findOrFail($id);
        return view('admin.categoria.editar',compact('item'));
    }

    /**
     * actulizar the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemUpdate=Categoria::findOrFail($id);
        $itemUpdate->nombre_cat = $request->categoria;
        $itemUpdate->save();
        return back()->with('mensaje', 'Se ha actualizado a: '.$request->item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ItemEliminar = Categoria::findOrFail($id);
        $ItemEliminar->delete();
        return back()->with('mensaje', 'El item fue Eliminada');
    }
}
