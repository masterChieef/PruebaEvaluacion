<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PreguntaVsItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id=[
            "3",
            "2",
            "1",
        ];
        foreach($id as $key => $value){
            DB::table('preguntas_vs_items')->insert([
                'item_id' => $value,
                'pregunta_id'=>1,
                'categoria_id'=>1,
                'valor'=>$value-1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
