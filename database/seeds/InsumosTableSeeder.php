<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InsumosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos')->insert([
            [
                'nombreInsumos' => 'Azúcar'
            ],
            [
                'nombreInsumos' => 'Azúcar blanca'
            ],
            [
                'nombreInsumos' => 'Esencia de vainilla'
            ],
            [
                'nombreInsumos' => 'Crema de leche'
            ],
            [
                'nombreInsumos' => 'Harina'
            ],
            [
                'nombreInsumos' => 'Huevo'
            ],
            [
                'nombreInsumos' => 'Levadura en polvo'
            ],
            [
                'nombreInsumos' => 'Leche condensada'
            ],
            [
                'nombreInsumos' => 'Leche evaporada'
            ],
            [
                'nombreInsumos' => 'Mantequilla'
            ],
            [
                'nombreInsumos'=> 'Mermelada de albaricoque'
            ],
            [
                'nombreInsumos' => 'Polvo de hornear'
            ],
            [
                'nombreInsumos'=> 'Sal'
            ]
        ]);
    }
}
