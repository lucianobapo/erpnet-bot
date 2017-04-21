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
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

$router = app(Router::class);

$routeConfigV1 = [
    'middleware' => 'cors',
    'namespace' => 'ErpNET\Auth\v1\Controllers',
//            'prefix' => $this->app['config']->get('debugbar.route_prefix'),
];

$router
    ->version('v1', function (Router $router) use ($routeConfigV1) {
        $router
            ->group($routeConfigV1, function (Router $router) use ($routeConfigV1) {
//                $router->get('appVersion', [
//                    'as'=>'api.appVersion',
//                    'uses'=> 'ApiController@appVersion'
//                ]);
                
                $router->get('/erpnetAuth/{provider}/{id}', ['as'=>'erpnetAuth.login','uses'=> 'ErpnetAuthController@login']);
//                $router->get('/delivery/productStock', ['as'=>'delivery.productStock','uses'=> 'DeliveryServiceController@productStock']);
//                $router->get('/delivery', ['as'=>'delivery.config','uses'=> 'DeliveryServiceController@config']);
//                $router->post('/delivery', ['as'=>'delivery.package','uses'=> 'DeliveryServiceController@package']);
            });
    });



//$routeConfigV2 = [
//    'namespace' => 'ErpNET\Models\v2\Controllers',
////            'prefix' => $this->app['config']->get('debugbar.route_prefix'),
//];
//
//$router
//    ->version('v2', function (Router $router) use ($routeConfigV2) {
//        $router
//            ->group($routeConfigV2, function (Router $router) {
//                $router->get('appVersion', [
//                    'as'=>'api.appVersion',
//                    'uses'=> 'ApiController@appVersion'
//                ]);
//            });
//
//    });