<?php
//namespace DartVadius\YmlGenerator;
//
//use DartVadius\YmlGenerator\abstractYmlOffer;

/**
 * offerSimpleYml
 *
 * @author DartVadius
 */
class simpleYmlOffer extends abstractYmlOffer {
    public function getOffer() {
        $offer = parent::getOffer();
        unset($offer['requared']['type']);
        return $offer;
    }
}