<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;



class Pregunta extends Model
{
    //ojo esto tengo que aplicar en todos los modelos ya que mis tablas son en singular
    protected $table="pregunta";
    
 
    public function preguntas_vs_items()
    {
        return $this->hasMany('App\Models\Admin\preguntas_vs_items','pregunta_id');
    }

}
