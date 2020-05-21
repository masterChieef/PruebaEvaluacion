<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RespuestaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Item=[
            "pesimo",
            "mal",
            "regular",
            "bien",
            "exelente",
        ];
        foreach($Item as $key => $value){
           DB::table('respuesta')->insert([
            'admin_id'=>1,
            'categoria_id'=>1, 
            'solucion'=>"Tiene que cuidar", 
            'estado'=>$value,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        }
    }
}
