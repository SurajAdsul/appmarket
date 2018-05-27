<?php

namespace SurajAdsul\AppMarket;

use Goutte\Client;
use Symfony\Component\BrowserKit\History;
use Symfony\Component\BrowserKit\CookieJar;

class CrawlerClient extends Client
{
    public function __construct(array $server = [], History $history = null, CookieJar $cookieJar = null)
    {
        $server['HTTP_USER_AGENT'] = array_get($server, 'HTTP_USER_AGENT', 'Other');

        parent::__construct($server, $history, $cookieJar);
    }
}
