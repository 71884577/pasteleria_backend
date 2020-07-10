<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InsumoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumo')->insert([
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Huevo',
                'cantInsumo'=>6,
                'umInsumo'=>'unidad'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Azúcar blanca',
                'cantInsumo'=>340,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Harina',
                'cantInsumo'=>130,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Mantequilla',
                'cantInsumo'=>130,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Esencia de vainilla',
                'cantInsumo'=>100,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Levadura en polvo',
                'cantInsumo'=>50,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Sal',
                'cantInsumo'=> 100,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 1,
                'nombreInsumo'=>'Mermelada de albaricoque',
                'cantInsumo'=> 200,
                'umInsumo'=>'gramos'
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Huevo',
                'cantInsumo' => 6,
                'umInsumo' => 'unidad',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Azúcar',
                'cantInsumo' => 200,
                'umInsumo' => 'gramos',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Harina',
                'cantInsumo' => 200,
                'umInsumo' => 'gramos',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Esencia de vainilla',
                'cantInsumo' => 1,
                'umInsumo' => 'cucharadita',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Polvo de hornear',
                'cantInsumo' => 1,
                'umInsumo' => 'cucharadita',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Leche condensada',
                'cantInsumo' => 1,
                'umInsumo' => 'lata',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Leche evaporada',
                'cantInsumo' => 1,
                'umInsumo' => 'lata',
            ],
            [
                'idReceta' => 2,
                'nombreInsumo' => 'Crema de leche',
                'cantInsumo' => 1,
                'umInsumo' => 'lata',
            ],

        ]);
    }
}
