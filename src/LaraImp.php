<?php

namespace Zabanya\LaraImp;

class LaraImp
{

    /**
     * @var string
     */
    protected $siteKey;

    /**
     * @var string
     */
    protected $script;

    /**
     * @var string
     */
    protected $mine;

    /**
     * @var string[]
     */
    protected $mobile;

    /**
     * @var string[]
     */
    protected $desktop;

    /**
     * @var string[]
     */
    protected $blocker;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @param string[] $config
     */
    public function __construct($config)
    {
        $this->siteKey = $config['siteKey'];
        $this->mine = $config['coin'];
        $this->script = $config['script'];
        $this->desktop = $config['desktop'];
        $this->mobile = $config['mobile'];
        $this->blocker = $config['blocker'];
        $this->enabled = true;
    }

    /**
     * Return the CoinImp Site Key.
     *
     * @return string[]
     */
    public function siteKey()
    {
        return $this->siteKey;
    }

    /**
     *
     * @return string
     */
    public function getCoin()
    {
        if(strtolower($this->mine) === 'web' || strtolower($this->mine) === 'webchain' ){
            return "c: 'w'";
        }

        return '';
    }

    /**
     *
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     *
     * @return string[]
     */
    public function getDesktop()
    {
        return $this->desktop;
    }

    /**
     *
     * @return string[]
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     *
     * @return string[]
     */
    public function getBlocker()
    {
        return $this->blocker;
    }

    /**
     * Check whether script rendering is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     */
    public function disable()
    {
        $this->enabled = false;
    }
}
