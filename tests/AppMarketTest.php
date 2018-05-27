<?php

namespace SurajAdsul\AppMarket\Test;

use SurajAdsul\AppMarket\AppMarket;

class AppMarketTest extends TestCase
{

    protected $newsletterList;

    public function setUp()
    {
        parent::setUp();
        $this->appdetails = (new AppMarket())->fetchAppDetails('https://itunes.apple.com/in/app/instagram/id389801252?mt=8');
    }

    /** @test */
    function test_it_can_determine_the_name_of_the_app()
    {
        $this->assertEquals('Instagram', $this->appdetails->name());
    }


    /** @test */
    function test_it_can_get_the_screenshots_of_the_app()
    {
        $this->assertArrayHasKey('stars', $this->appdetails->rating());
        $this->assertArrayHasKey('count', $this->appdetails->rating());
    }

}