<?php

namespace App\Http\Controllers;
use App\Models\Admin\pregunta;
use App\Models\Admin\Respuesta;
use App\Models\Admin\preguntas_vs_items;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Admin\Categoria;
use Illuminate\Support\Facades\DB;
class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }

    public function login()
    {
        return view('login');
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prueba()
    {
        $pregunta=DB::table('preguntas_vs_items') 
        ->join('pregunta','pregunta.id','=','preguntas_vs_items.pregunta_id')
        ->join('item','item.id','=','preguntas_vs_items.item_id')
        ->join('categoria','categoria.id','=','preguntas_vs_items.categoria_id')
        ->select('pregunta','nombre_item','valor','nombre_cat')->orderBy('categoria.id')->orderBy('pregunta')->orderBy('valor','desc')->get();
        return $pregunta;
    }

    public function preguntas(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
