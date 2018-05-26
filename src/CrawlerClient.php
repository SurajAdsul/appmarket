<?php

namespace SurajAdsul\AppMarket;

use Goutte\Client;
use Symfony\Component\BrowserKit\CookieJar;
use Symfony\Component\BrowserKit\History;

class CrawlerClient extends Client
{
    public function __construct(array $server = array(), History $history = null, CookieJar $cookieJar = null)
    {
        $server['HTTP_USER_AGENT'] = array_get($server, 'HTTP_USER_AGENT', 'Other');

        parent::__construct($server, $history, $cookieJar);
    }
}