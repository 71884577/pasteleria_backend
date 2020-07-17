<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1/'], function ($router) {

    /**
     * Routes for resource auth
     */
    $router->post('login','AuthsController@authenticate');
    $router->post('valid','AuthsController@valid');

    $router->get('receta','RecetaController@all');
    $router->post('receta','RecetaController@store');
    $router->delete('receta/{id}', 'RecetaController@remove');
    $router->put('receta/{id}', 'RecetaController@update');

    $router->get('produccion','ProduccionController@all');
    $router->post('produccion', 'ProduccionController@store');

    $router->get('insumos','InsumosController@all');
    $router->post('insumos','InsumosController@store');
    $router->delete('insumos/{id}', 'InsumosController@remove');
    $router->put('insumos/{id}', 'InsumosController@update');

    $router->get('stock','StockController@all');
    $router->get('stock-reporte','StockController@reporte');
    $router->post('stock','StockController@store');


});





