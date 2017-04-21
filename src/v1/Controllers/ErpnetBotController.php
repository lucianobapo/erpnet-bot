<?php

namespace ErpNET\Bot\v1\Controllers;

use ErpNET\Bot\v1\Interfaces\ErpnetBotService;
use Illuminate\Http\Request;


/**
 *  Resource representation.
 *
 * @Resource("erpnetBot", uri="/erpnetBot")
 */
class ErpnetBotController extends Controller
{

    /*
     * @var ErpnetBotService
     */
    protected $service;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        if (!request()->wantsJson()) {
            $this->middleware('web');
        }
    }

    /**
     * @param string $provider
     * @param string $id
     * @return \Illuminate\Contracts\View\View | \Illuminate\Http\Response
     */
    public function callback(Request $request, $provider, $token)
    {
        $class = 'ErpNET\\Bot\\v1\\Services\\ErpnetBot' . ucfirst($provider) . 'Service';
        if ($token==env(strtoupper($provider).'_BOT_TOKEN')) {
            return response()->json([
                'error'   => true,
                'message' => 'Token Error'
            ]);
        }
        if (!class_exists($class)) {
            return response()->json([
                'error'   => true,
                'message' => 'No Class: '.$class
            ]);
        }

        $this->service = new ($class);

        if($this->service->resolveCommand($request))

        $allData = '';

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $allData,
            ]);
        }

        return view('welcome')->with(['data'=>$allData]);
    }
}
