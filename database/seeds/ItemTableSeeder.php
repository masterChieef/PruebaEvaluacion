<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Item=[
            "Si",
            "No",
            "Talvez / No lo sé"
        ];
        foreach($Item as $key => $value){
            DB::table('item')->insert([
                'nombre_item' => $value,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
