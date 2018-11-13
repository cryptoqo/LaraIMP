<?php

namespace Cryptoqo\LaraImp;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cryptoqo\LaraImp\LaraImp
 */
class LaraImpFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraimp';
    }
}
