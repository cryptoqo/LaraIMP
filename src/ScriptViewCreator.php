<?php

namespace Cryptoqo\LaraImp;

use Illuminate\View\View;
use Cryptoqo\LaraImp\LaraImp as LaraImp;

class ScriptViewCreator
{
    /** @var \Cryptoqo\LaraImp\LaraImp */
    protected $laraImp;

    public function __construct(LaraImp $laraImp)
    {
        $this->laraImp = $laraImp;
    }

    public function create(View $view)
    {
        $view
            ->with('enabled', $this->laraImp->isEnabled())
            ->with('siteKey', $this->laraImp->siteKey())
            ->with('coin', $this->laraImp->getCoin())
            ->with('script', $this->laraImp->getScript())
            ->with('desktop', $this->laraImp->getDesktop())
            ->with('mobile', $this->laraImp->getMobile())
            ->with('blocker', $this->laraImp->getBlocker());
    }
}
