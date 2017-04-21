<?php

namespace ErpNET\Bot\v1\Interfaces;

use Illuminate\Http\Request;


/**
 * Interface ErpnetBotService
 * @package namespace ErpNET\Bot\v1\Interfaces;
 * @see \ErpNET\Bot\v1\Services\ErpnetBotMessengerService
 * @see \ErpNET\Bot\v1\Services\ErpnetBotTelegramService
 */
interface ErpnetBotService
{
    /**
     * @param Request $request
     * @return bool
     */
    public function resolveCommand(Request $request);

    /**
     * @param Request $request
     * @return bool
     */
    public function unknownCommand(Request $request);

    /**
     * @param Request $request
     * @return bool
     */
    public function executeCommand(Request $request);
}
