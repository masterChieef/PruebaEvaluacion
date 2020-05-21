<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;


class preguntas_vs_items extends Model
{
    //ojo esto tengo que aplicar en todos los modelos ya que mis tablas son en singular
    protected $table="preguntas_vs_items";

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
    public function items()
    {
        return $this->belongsTo(Item::class);
    }

}
