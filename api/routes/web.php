<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$prefix = 'api';
$version = env('API_VERSION');

$router->get('/', function () use ($router) {
    return env('APP_NAME');
});


$router->group([ 'prefix' => $prefix . '/' . $version ], function () use ($router) {
    $router->get('health-check', 'HealthController@index');
});