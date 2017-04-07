<?php

namespace DartVadius\YmlGenerator;

use DartVadius\YmlGenerator\offer\BookAudioYmlOffer;
use DartVadius\YmlGenerator\offer\BookPaperYmlOffer;
use DartVadius\YmlGenerator\offer\EventYmlOffer;
use DartVadius\YmlGenerator\GeneratorYmlOffer;
use DartVadius\YmlGenerator\offer\HeadYmlOffer;
use DartVadius\YmlGenerator\offer\MediaYmlOffer;
use DartVadius\YmlGenerator\offer\MedicineYmlOffer;
use DartVadius\YmlGenerator\offer\SimpleYmlOffer;
use DartVadius\YmlGenerator\offer\TourYmlOffer;
use DartVadius\YmlGenerator\ValidatorYmlOffer;
use DartVadius\YmlGenerator\offer\VendorYmlOffer;

/**
 * YmlFactory
 *
 * @author DartVadius
 */
class YmlFactory {
    public static function getYml($name) {
        $class = ucfirst($name) . 'YmlOffer';        
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("Wrong class");
        }
    }
}