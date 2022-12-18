<?php

namespace Skcin7\LaravelGlobalSettings\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelGlobalSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'global_settings';
    }
}
