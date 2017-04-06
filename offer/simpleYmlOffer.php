<?php
//namespace DartVadius\YmlGenerator;
//
//use DartVadius\YmlGenerator\abstractYmlOffer;

/**
 * offerSimpleYml
 *
 * @author DartVadius
 */
class yml_simpleYmlOffer extends yml_abstractYmlOffer {
    
    public function getOffer() {
        $offer = parent::getOffer();        
        unset($offer['requared']['type']);
        return $offer;
    }
}