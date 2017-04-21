<?php

namespace ErpNET\Bot\v1\Interfaces;

/**
 * Interface ErpnetBotService
 * @package namespace ErpNET\Bot\v1\Interfaces;
 * @see \ErpNET\Bot\v1\Repositories\AuthRepositoryEloquent
 */
interface ErpnetBotService
{
    public function resolveCommand(\Illuminate\Http\Request $request):boolean;
}
