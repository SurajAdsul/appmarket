<?php

namespace SurajAdsul\AppMarket;

abstract class AbstractStoreInfo
{
    const ANDROID_SUBSTRING = '://play.google.com';
    const IOS_REGEX = '/https?:\/\/itunes\.apple\.com\/((?<country>[a-zA-Z]{2})\/)?.+\/id(?<id>\d+)/';
    const APP_STORE_ID_ANDROID = 1;
    const APP_STORE_ID_APPLE = 2;

    protected $previewUrl;
    protected $platform;
    protected $country;
    protected $storeId;
    protected $data;
    protected $name;
    protected $ratingStars = 0;
    protected $ratingCount = 0;
    protected $screenshots = [];
    protected $icon;
    protected $contentRating = '';

    /**
     * @param array $details
     */
    public function __construct(array $details)
    {
        $this->platform = $details['platform'];
        $this->storeId = $details['storeId'];
        $this->data = $this->lookup();
    }

    abstract protected function lookup();

    final public function name()
    {
        return $this->name;
    }

    final public function icon()
    {
        return $this->icon;
    }

    final public function rating()
    {
        return [
            'stars' => $this->ratingStars,
            'count' => $this->ratingCount,
        ];
    }

    final public function screenshots()
    {
        return $this->screenshots;
    }

    final public function contentRating()
    {
        return $this->contentRating;
    }

    final public function previewUrl()
    {
        return $this->previewUrl;
    }

    protected function addScheme($url, $scheme = 'http://')
    {
        if (! preg_match('~^(?:f|ht)tps?://~i', $url)) {
            $url = ltrim($url, '/'); //handle this url '//google.com'
            $url = $scheme.$url;
        }

        return $url;
    }
}
