<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PreguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pregunta=[
            "¿Tu computadora tiene seguridad?",
            "¿Tu empresa posee departamento de seguridad informatica?",
        ];
        foreach($pregunta as $key => $value){
            DB::table('pregunta')->insert([
                'admin_id'=>1,
                'pregunta' => $value,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
