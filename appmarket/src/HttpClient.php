<?php

namespace SurajAdsul\AppMarket;

use GuzzleHttp\Client;

class HttpClient extends Client
{
    public function __construct(array $config = [])
    {
        $defaults = [
            'defaults' => [
                'headers' => [
                    'User-Agent' => 'Other',
                ]
            ]
        ];

        parent::__construct(array_merge($defaults, $config));
    }
}