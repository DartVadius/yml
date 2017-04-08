<?php
namespace DartVadius\YmlGenerator\offer;

use DartVadius\YmlGenerator\offer\AbstractYmlOffer;

/**
 * offerSimpleYml
 *
 * @author DartVadius
 */
class SimpleYmlOffer extends AbstractYmlOffer {
    
    public function getOffer() {
        $offer = parent::getOffer();        
        unset($offer['requared']['type']);
        return $offer;
    }
}