<?php

namespace SurajAdsul\AppMarket\Test;

use SurajAdsul\AppMarket\AppMarket;

class AppMarketTest extends TestCase{

//    protected $newsletterList;
//
//    public function setUp()
//    {
//        parent::setUp();
//        $this->newsletterList = new AppMarket();
//    }


    function it_can_determine_the_name_of_the_list(){

//        $details = $this->newsletterList->fetchAppDetails('https://itunes.apple.com/in/app/instagram/id389801252?mt=8');
//
//        $this->assertEquals('hello@orchestraplatform.com', $details->name());
        $this->assertEquals('hello@orchestraplatform.com', 'hello@orchestraplatform.com\'');


//        dd($this->newsletterList->fetchAppDetails('https://itunes.apple.com/in/app/instagram/id389801252?mt=8'));

    }

}