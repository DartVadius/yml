<?php
namespace DartVadius\YmlGenerator\model;
/**
 * offerSimpleYml
 *
 * @author DartVadius
 */
class offerSimpleYml extends offerYml {
    public function getOffer() {
        $offer = parent::getOffer();
        unset($offer['requared']['type']);
        return $offer;
    }
}