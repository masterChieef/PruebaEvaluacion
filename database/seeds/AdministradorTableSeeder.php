<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdministradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  $administrador = array("franco","zabala","admin","123");*/
        DB::table('administrador')->insert([
            'nombre_admin'=>"franco",
            'apellido_admin'=>"zabala",
            'usuario'=>"admin",
            'password'=>"123",
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),   
        ]); 
    }
}
