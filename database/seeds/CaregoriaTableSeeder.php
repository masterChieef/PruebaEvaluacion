<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CaregoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias=[
            "persona",
            "tecnología",
            "procesos"
        ];
        foreach($categorias as $key => $value){
            DB::table('categoria')->insert([
                'nombre_cat' => $value,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
