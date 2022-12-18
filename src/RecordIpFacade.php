<?php

namespace ZYKUtil\RecordIp;

use Illuminate\Support\Facades\Facade;

class RecordIpFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return RecordIpService::class;
    }
}
