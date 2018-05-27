<?php

namespace SurajAdsul\AppMarket;

class AppStoreInfo extends AbstractStoreInfo
{
    private static $lookupUrl = 'https://itunes.apple.com/%s/lookup?id=%d';

    /**
     * @return array
     */
    protected function lookup()
    {
        $url = sprintf(self::$lookupUrl, $this->country, $this->storeId);

        $client = new HttpClient();
        $response = $client->get($url);
        $data = array_get(json_decode($response->getBody(), true), 'results.0');
        $this->name = array_get($data, 'trackCensoredName');
        $this->icon = array_get($data, 'artworkUrl512');
        $this->screenshots = array_merge(array_get($data, 'ipadScreenshotUrls', []), array_get($data, 'screenshotUrls', []));
        $this->ratingStars = round(array_get($data, 'averageUserRating', 0));
        $this->ratingCount = array_get($data, 'userRatingCount', 0);
        $this->contentRating = array_get($data, 'contentAdvisoryRating', '');

        return $data;
    }
}
