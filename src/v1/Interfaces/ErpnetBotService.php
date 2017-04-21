<?php

namespace ErpNET\Bot\v1\Interfaces;

use Illuminate\Http\Request;


/**
 * Interface ErpnetBotService
 * @package namespace ErpNET\Bot\v1\Interfaces;
 * @see \ErpNET\Bot\v1\Services\ErpnetBotMessengerService
 */
interface ErpnetBotService
{
    /**
     * @param Request $request
     * @return bool
     */
    public function resolveCommand(Request $request):boolean;
}
