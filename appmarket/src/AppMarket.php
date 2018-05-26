<?php

namespace SurajAdsul\AppMarket;


class AppMarket
{
    const ANDROID_SUBSTRING = '://play.google.com';
    const IOS_REGEX = '/https?:\/\/itunes\.apple\.com\/((?<country>[a-zA-Z]{2})\/)?.+\/id(?<id>\d+)/';
    const PLATFORM_ANDROID = 1;
    const PLATFORM_IOS = 2;


    public static function fetchAppDetails($previewUrl)
    {

        $details = self::mobileAppStore($previewUrl);

        switch ($details['platform']) {
            case self::PLATFORM_IOS:
                $appDetails = new AppStoreInfo($details);
                break;
            case self::PLATFORM_ANDROID:
                $appDetails = new PlayStoreInfo($details);
                break;
            default:
                throw new \Exception();
        }

        return $appDetails;
    }

    private static function mobileAppStore($previewUrl, $withCountry = false)
    {
        $storeId = null;
        $platform = null;
        $country = null;
        $matches = [];

        if (strpos($previewUrl, self::ANDROID_SUBSTRING) !== false) {
            $request = new \GuzzleHttp\Psr7\Request('GET', $previewUrl);
            parse_str($request->getUri()->getQuery(), $output);
            $storeId = $output['id'] ?: null;
            $platform = self::PLATFORM_ANDROID;
        } elseif (preg_match(self::IOS_REGEX, $previewUrl, $matches)) {
            $storeId = !empty($matches['id']) ? $matches['id'] : null;
            $platform = self::PLATFORM_IOS;
        }

        $data = [
            'storeId' => $storeId,
            'platform' => $platform,
        ];

        return $data;
    }

}
