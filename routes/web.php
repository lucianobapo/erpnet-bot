<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Routing\Router;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::resource('partners', '\ErpNET\Models\Controllers\PartnersController');

$routeConfig = [
    'namespace' => 'ErpNET\Auth\v1\Controllers',
//            'prefix' => $this->app['config']->get('debugbar.route_prefix'),
];

$router = app(Router::class);

$router->group($routeConfig, function(Router $router) {

//    $router->resource('partners', 'PartnersController');

//            $router->get('clockwork/{id}', [
//                'uses' => 'OpenHandlerController@clockwork',
//                'as' => 'debugbar.clockwork',
//            ]);
//
//            $router->get('assets/stylesheets', [
//                'uses' => 'AssetController@css',
//                'as' => 'debugbar.assets.css',
//            ]);
//
//            $router->get('assets/javascript', [
//                'uses' => 'AssetController@js',
//                'as' => 'debugbar.assets.js',
//            ]);
});