<?php

namespace SurajAdsul\AppMarket\Test;

use SurajAdsul\AppMarket\AppMarketFacade;
use SurajAdsul\AppMarket\AppMarketServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
//    protected $newsletterList;
//
//    public function setUp()
//    {
//        parent::setUp();
//        $this->newsletterList = new AppMarket('https://itunes.apple.com/in/app/instagram/id389801252?mt=8');
//    }

    protected function getPackageProviders($app)
    {
        return [AppMarketServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['AppMarket' => AppMarketFacade::class];
    }
}
