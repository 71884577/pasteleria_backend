<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RecetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receta')->insert([
            [
                'idReceta' => 1,
                'nombreReceta'=>'Pastel Sacha',
                'tipReceta' =>'Clásica',
                'desReceta' =>'bizcocho de chocolate relleno de mermelada de albaricoque y cubierto por un delicado glaseado',
            ],
            [
                'idReceta' => 2,
                'nombreReceta'=> 'Pastel Tres Leches',
                'tipReceta' =>'Moderna',
                'desReceta' =>'pastel de tres tipos de leche condensada, evaporada y crema de leche con adorno de cereza y canela en polvo'
            ],

        ]);
    }
}
