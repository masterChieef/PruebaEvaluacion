<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pregunta;
use App\Models\Admin\Categoria;
use App\Models\Admin\Item;
use App\Models\Admin\preguntas_vs_items;


class PreguntasVsItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $pregunta=preguntas_vs_items::join('pregunta','pregunta.id','=','preguntas_vs_items.pregunta_id')
        ->join('item','item.id','=','preguntas_vs_items.item_id')
        ->join('categoria','categoria.id','=','preguntas_vs_items.categoria_id')->orderBy('preguntas_vs_items.id')
        ->get(['preguntas_vs_items.id','pregunta.pregunta','item.nombre_item','categoria.nombre_cat','preguntas_vs_items.valor']);
        return view('admin.pregunta.index',compact('pregunta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $categoria=Categoria::orderBy("id")->get();
        $items=Item::orderBy("id")->get();
        return view('admin.pregunta.crear',compact('items','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $pregunta=$request->preguntar; 
        $valor= self::cagarPregunta($pregunta);
        $categoria=$request->categoria; 
        $itemP=$request->itemP;
        $itemI=$request->itemI;
        $itemN=$request->itemN; 
        
        self::formular($valor,$categoria,$itemP,2);
        self::formular($valor,$categoria,$itemI,1);
        self::formular($valor,$categoria,$itemN,0);
        
        return back()->with('mensaje', 'Se ha agregado una nueva llamda ');;
    }
    /** 
     *  funcion de guardar y buscar ultimo dato cargado en preguntas
     * 
    */
    public function cagarPregunta($info)
    {
        $pregunta=new pregunta;
        $pregunta->admin_id=1; 
        $pregunta->pregunta=$info;
        $pregunta->save();
        $preguntar=$pregunta->id;
        return $preguntar;
    }

    /**
     *  funcion de guardar todo los valores
     * 
     */
    public function formular($pregunta,$categoria,$item,$valor)
    {
        $items = new preguntas_vs_items ;
        $items->pregunta_id=$pregunta;
        $items->categoria_id=$categoria;
        $items->item_id=$item;
        $items->valor=$valor;
        $items->save();     
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
        $consulta=preguntas_vs_items::findOrFail($id);
        $consulta1=preguntas_vs_items::findOrFail($id-1);
        $consulta2=preguntas_vs_items::findOrFail($id-2);
        $valorC=Categoria::findOrFail($consulta->categoria_id);
        $itemV=Item::findOrFail($consulta->item_id);
        $itemV1=Item::findOrFail($consulta1->item_id);
        $itemV2=Item::findOrFail($consulta2->item_id);
        $categoria=Categoria::all();
        $itemS=Item::all();
        return view('admin.pregunta.editar',compact('consulta','categoria','valorC','itemV','itemS','itemV1','itemV2'));
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

        $busqueda=preguntas_vs_items::findOrFail($id);
        $pregunta_id=$busqueda->pregunta_id;
        $pregunta= $request->preguntar;
        $preguntaA=self::actualizarPregunta($pregunta_id,$pregunta);
        $categoria=$request->categoria;
        $itemP=$request->itemP;
        $itemI=$request->itemI;
        $itemN=$request->itemN; 
        self::actualizarM($id,$preguntaA,$categoria,$itemN,0);
        self::actualizarM($id-1,$preguntaA,$categoria,$itemI,1);
        self::actualizarM($id-2,$preguntaA,$categoria,$itemP,2);
        return back()->with('mensaje', 'Se ha actualizado');
    }
    /**
     * esta funcion es para la actualizacion de forma dinamica
     * 
     */
    public function actualizarM($id,$pregunta,$categoria,$item,$valor){
        $items=preguntas_vs_items::findOrFail($id);
        $items->pregunta_id=$pregunta;
        $items->categoria_id=$categoria;
        $items->item_id=$item;
        $items->valor=$valor;
        $items->save();
    }
    /**
     *  función que actualiza unicamente pregunta
     */
    
    public function actualizarPregunta($id,$preguntas){
        $pregunta=Pregunta::findOrFail($id);
        $pregunta->admin_id=1; 
        $pregunta->pregunta=$preguntas;
        $pregunta->save();
        $preguntar=$pregunta->id;
        return $preguntar;
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valorId=$id;
        self::destruir($valorId);
        return back()->with('mensaje', 'La formulacion de la pregunta fue Eliminado');
    }
    public function destruir($id){
        for ($i=0; $i < 3; $i++) {
            $valor=($id-$i);    
            if ($valor==0) {
                $valor*-1;
            }
                $ItemEliminar = preguntas_vs_items::findOrFail($valor);    
                $ItemEliminar->delete();
        }
    }
}
