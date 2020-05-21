<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Respuesta;
use App\Models\Admin\Categoria;


class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta=Categoria::join('respuesta','respuesta.categoria_id','=','categoria.id')->get();
        return view('admin.respuesta.index',compact('respuesta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $categoria=Categoria::orderBy("id")->get();
        return view('admin.respuesta.crear',compact('categoria'));
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
            'estado' => 'required',
            'categoria' => 'required',
            'solucion' => 'required',
        ]);
        $items = new Respuesta;
        $items->admin_id=1;
        $items->categoria_id = $request->categoria;
        $items->estado = $request->estado; 
        $items->solucion = $request->solucion;
        $items->save();
        return back()->with('mensaje', 'Se ha agregado una nueva llamda ');
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
        $item=Respuesta::findOrFail($id);
        $valorC=Categoria::findOrFail($item->categoria_id);
        $categoria=Categoria::all();
        return view('admin.respuesta.editar',compact('item','categoria','valorC'));
   
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
        $itemUpdate=Respuesta::findOrFail($id);
        $itemUpdate->admin_id=1;
        $itemUpdate->categoria_id=$request->categoria;
        $itemUpdate->estado = $request->estado; 
        $itemUpdate->solucion = $request->solucion;
        $itemUpdate->save();
        return back()->with('mensaje', 'Se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ItemEliminar = Respuesta::findOrFail($id);
        $ItemEliminar->delete();
        return back()->with('mensaje', 'El item fue Eliminada');
    }
}
