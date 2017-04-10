<?php

namespace DartVadius\YmlGenerator;

use DartVadius\YmlGenerator\offer;

/**
 * YmlFactory
 *
 * @author DartVadius
 */
class YmlFactory {
    public static function getYml($name) {
        switch (strtolower($name)) {
            case 'head':                
                return new offer\HeadYmlOffer();
            case 'bookaudio':
                return new offer\BookAudioYmlOffer();
            case 'bookpaper':
                return new offer\BookPaperYmlOffer();
            case 'event':
                return new offer\EventYmlOffer();
            case 'media':
                return new offer\MediaYmlOffer();
            case 'medicine':
                return new offer\MedicineYmlOffer();
            case 'simple':
                return new offer\SimpleYmlOffer();
            case 'tour':
                return new offer\TourYmlOffer();
            case 'vendor':
                return new offer\VendorYmlOffer();    
            default :
                return FALSE;
        }
    }
}