<?php

namespace SurajAdsul\AppMarket;

class PlayStoreInfo extends AbstractStoreInfo
{
    private static $lookupUrl = "https://play.google.com/store/apps/details?id=%s";

    /**
     * @return array
     */
    protected function lookup()
    {
        $url = sprintf(self::$lookupUrl, $this->storeId);

        $client = new CrawlerClient();
        $crawler = $client->request('GET', $url);

        $this->name = $crawler->filter('[itemprop="name"]')->text();

        $crawler->filter('div.score-container meta')->each(function($node) {
            switch ($node->attr('itemprop')) {
                case 'ratingValue':
                    $this->ratingStars = round($node->attr('content'));
                    break;
                case 'ratingCount':
                    $this->ratingCount = $node->attr('content');
            }
        });

//        $this->contentRating = $crawler->filter('[itemprop="contentRating"]')->text();
        $iconUrl = $crawler->filter('[itemprop="image"]')->attr('src');
        $this->icon = $this->addScheme($iconUrl);

        $crawler->filter('[alt="Screenshot Image"]')->each(function($node) {
            $this->screenshots[] = $this->addScheme($node->attr('src'));
        });
    }
}