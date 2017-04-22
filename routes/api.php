<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Dingo\Api\Routing\Router;

$router = app(Router::class);

$routeConfigV1 = [
    'middleware' => 'cors',
    'namespace' => 'ErpNET\Bot\v1\Controllers',
//            'prefix' => $this->app['config']->get('debugbar.route_prefix'),
];

$router
    ->version('v1', function (Router $router) use ($routeConfigV1) {
        $router
            ->group($routeConfigV1, function (Router $router) use ($routeConfigV1) {
                
                $router->get('/callback/{provider}/{token}', ['as'=>'erpnetBot.callback','uses'=> 'ErpnetBotController@callback']);
                $router->post('/callback/{provider}/{token}', ['as'=>'erpnetBot.callback','uses'=> 'ErpnetBotController@callback']);
//                $router->get('/delivery/productStock', ['as'=>'delivery.productStock','uses'=> 'DeliveryServiceController@productStock']);
//                $router->get('/delivery', ['as'=>'delivery.config','uses'=> 'DeliveryServiceController@config']);
//                $router->post('/delivery', ['as'=>'delivery.package','uses'=> 'DeliveryServiceController@package']);
            });
    });