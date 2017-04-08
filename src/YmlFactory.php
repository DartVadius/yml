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
        switch (strtolower($name)) {
            case 'head':                
                return new HeadYmlOffer();
            case 'bookaudio':
                return new BookAudioYmlOffer();
            case 'bookpaper':
                return new BookPaperYmlOffer();
            case 'event':
                return new EventYmlOffer();
            case 'media':
                return new MediaYmlOffer();
            case 'medicine':
                return new MedicineYmlOffer();
            case 'simple':
                return new SimpleYmlOffer();
            case 'tour':
                return new TourYmlOffer();
            case 'vendor':
                return new VendorYmlOffer();    
            default :
                return FALSE;
        }
    }
}