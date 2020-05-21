<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item=Item::orderBy("id")->get();
        return view('admin.item.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.item.creaar');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        /* $request->validate([
            'item'=>'require|min:4|max:250'
        ]); */
        $request->validate([
            'item' => 'required'
        ]);
        $items = new Item;
        $items->nombre_item = $request->item;
        $items->save();
        return back()->with('mensaje', 'Se ha agregado una el nuevo item de '.$request->item);
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
    public function editar($id){
        $item=Item::findOrFail($id);
        return view('admin.item.editar',compact('item'));
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
        $itemUpdate=Item::findOrFail($id);
        $itemUpdate->nombre_item = $request->item;
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
        $ItemEliminar = Item::findOrFail($id);
        $ItemEliminar->delete();
        return back()->with('mensaje', 'El item fue Eliminada');
    }
}
