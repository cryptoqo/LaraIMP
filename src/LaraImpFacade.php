<?php

namespace Zabanya\LaraImp;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zabanya\LaraImp\LaraImp
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
