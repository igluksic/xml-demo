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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->post('/api/products', [
    'middleware' => 'api.key.auth',
    'as' => 'post.products',
    'uses' => 'ApiController@storeProducts'
    ]);

//Mock endpoint
$router->get('/api/offer/{code}', [
    'middleware' => 'basic.auth',
    'as' => 'get.offer',
    'uses' => 'ApiController@getOffer'
]);

$router->get('/', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

$router->post('get-offers-data', [
    'as' => 'get.offers.data', 'uses' => 'HomeController@getApiData'
]);

