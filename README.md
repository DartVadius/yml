About

Generator YML (Yandex Market Language). Uses standard XMLWriter for generating XML file. 

Requirements: PHP 5.5.0 or >= version.

Generator supports this offer types:
- simple (Simplified description of the product offer, no type)
- vendor (vendor.model)
- bookAudio (audiobook)
- bookPaper (book)
- vent (event-ticket)
- media (artist.title)
- medicine (medicine)
- tour (tour)

How to use:
```php
<?php
use DartVadius\YmlGenerator\YmlFactory;

/**
* Creating header for yml document
*/

$head = YmlFactory::getYml('head');
```
You can setting up header by few ways:

1. Main part of settings you can set by config file (offer/config/config.php)

2. Or using method setAllValues:
```php
    $head->setAllValues($values);
```
where $values is array ['tag name' => 'value'], for example:
```php
    [
        'name' => 'company name',
        'url' => 'url to your site main page',
        'platform' => 'platform name',
        etc....
    ]
```
Full list of tags see below

Warning! This method has limitations. To set tags* that represent a list of values, 
use their own methods

*Tags: 'currencies', 'categories', 'delivery-options'

3. Or set parameters one by one:
```php
    $head->setName($name)
    ->setCompany($company)
    ->setEmail($email)
    ->setCategory($categories)
    etc...;

/**
*Creating offer for yml document
*/


$simpleOffer = YmlFactory::getYml('simple');
$eventOffer = YmlFactory::getYml('event');
$audioBook = YmlFactory::getYml('bookAudio');
```
etc...


You can setting up offer by few ways:

1. Using method setAllValues:

    $simpleOffer->setAllValues($values);

    where $values is array ['tag name' => 'value'], for example:
```php    
    [
        'name' => 'product name',
        'price' => 'price',
        'vendor' => 'vendor name',
        etc....
    ]
```
Full list of tags see below

Warning! This method has limitations. To set tags* that represent a list of values, 
use their own methods

*tags: 'delivery-options', 'outlets', 'barcode', 'picture', 'param', 'dimensions',
        'rec', 'options'

2. Or set parameters one by one:
```php
    $simpleOffer->setName($name)
    ->setModel($model)
    ->setVendor($vendor)
    ->setDeliveryOptions($deliveryOptions)
    etc...;

/**
* Generating XML
*/

$generator = YmlFactory::getYml('generator');
```
You can generate XML (surprise) by few ways

1.  
```php
$xml = $generator->generate($head->getHead(), $offers);
```    
    where $offers - array with offers:
```php
    [
        $simpleOffer->getOffer(),
        $eventOffer->getOffer(),
        $audioBook->getOffer(),
        etc...
    ]
```
2.  
```php
    $generator->generateHead($head->getHead());
    $generator->generateOffer($simpleOffer->getOffer());
    $generator->generateOffer($eventOffer->getOffer());
    $generator->generateOffer($audioBook->getOffer());
    etc...
    $xml = $generator->generateFooter();
```


Full list of supported YML Header Tags:

- name
- company
- url
- currencies
- categories
- platform
- version
- agency
- email
- delivery-options
- cpa
- adult


Full list of supported YML Offer Tags

- name
- id
- type
- url
- price
- currencyId
- categoryId
- picture
- model
- vendor
- vendorCode
- cbid
- bid
- fee
- oldprice
- delivery
- delivery-options
- available
- store
- outlets
- description
- sales_notes
- min-quantity
- step-quantity
- manufacturer_warranty
- country_of_origin
- adult
- barcode
- cpa
- param
- weight
- dimensions
- downloadable
- rec
- ISBN
- author
- publisher
- series
- year
- volume
- part
- language
- table_of_contents
- performed_by
- performance_type
- storage
- format
- recording_length
- binding
- page_extent
- place
- date
- hall
- hall_part
- is_premiere
- is_kids
- title
- artist
- media
- starring
- director
- originalName
- country
- days
- included
- transport
- worldRegion
- country
- region
- dataTour
- hotel_stars
- room
- meal
- price_min
- price_max
- options
