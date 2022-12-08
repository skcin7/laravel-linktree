<?php

namespace Skcin7\LaravelLinktree\Facades;

use Illuminate\Support\Facades\Facade;

class Linktree extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'linktree';
    }
}
