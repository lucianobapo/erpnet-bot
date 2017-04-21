<?php

namespace ErpNET\Models\v2\Controllers;

class ApiController extends Controller
{
    public function appVersion(){
        $data = [
            "version" => env('APP_LAST_VERSION', "0.0.2")
        ];

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $data,
            ]);
        }

        return view('data')->with([
            'data' => $data,
        ]);
    }

    public function opened(){
        return response()->json([
            "opened"=>env('DELIVERY_OPEN', true),
            "message"=>"Estamos em manutenção no momento, retornaremos novamente em: ".
                env('DELIVERY_RETURN', '29/06/2015 às 20:00'),
        ]);
    }
}
