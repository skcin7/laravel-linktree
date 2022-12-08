<?php

namespace Skcin7\LaravelLinktree\Facades;

use Illuminate\Support\Facades\Facade;

class LinktreeSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'settings';
    }
}
