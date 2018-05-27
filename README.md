
# Get playstore and appstore details from the preview URL  

[![Latest Version on Packagist](https://img.shields.io/packagist/v/surajadsul/appmarket.svg?style=flat-square)](https://packagist.org/packages/surajadsul/appmarket)
[![Quality Score](https://img.shields.io/scrutinizer/g/SurajAdsul/appmarket.svg?style=flat-square)](https://scrutinizer-ci.com/g/SurajAdsul/appmarket)
[![StyleCI](https://styleci.io/repos/134960447/shield)](https://styleci.io/repos/134960447)
  
  
The surajadsul/appmarket package provides easy to extract   
all the information from play store and app store.  
  
Installation  
  
You can install the package via composer:  

    composer require surajadsul/appmarket

## Register Service Provider and Facade

Register the service providers and Facades in  `config/app.php`

```
SurajAdsul\AppMarket\AppMarketServiceProvider::class,

```

```
'AppMarketFacade' => SurajAdsul\AppMarket\Facade::class,
```

## Usage

