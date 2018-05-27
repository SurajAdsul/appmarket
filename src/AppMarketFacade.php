<?php

namespace SurajAdsul\AppMarket;

use Illuminate\Support\Facades\Facade as BaseFacade;

class AppMarketFacade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'AppMarket';
    }
}