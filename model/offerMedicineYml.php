<?php

/**
 * Description of offerMedicineYml
 *
 * @author DartVadius
 */
class offerMedicineYml extends offerYml {    
    public function __construct() {
        $this->type = 'medicine';
        $this->pickup = 'true';
        $this->available = 'true';
        $this->delivery = 'false';
    }
    
    public function setPickup() {
        return FALSE;
    }
    public function setDelivery() {
        return FALSE;
    }
    public function setDeliveryOptions() {
        return FALSE;
    }
    public function setFee() {
        return FALSE;
    }
    public function setAvailable() {
        return FALSE;
    }
    public function setMinQuantity() {
        return FALSE;
    }
    public function setStepQuantity() {
        return FALSE;
    }
    public function setManufacturerWarranty() {
        return FALSE;
    }
    public function setAdult() {
        return FALSE;
    }
    public function setDownloadable() {
        return FALSE;
    }


    public function getOffer() {
        $offer = parent::getOffer();        
        unset($offer['optional']['fee']);
        unset($offer['optional']['delivery-options']);
        unset($offer['optional']['available']);
        unset($offer['optional']['min-quantity']);
        unset($offer['optional']['step-quantity']);
        unset($offer['optional']['manufacturer_warranty']);
        unset($offer['optional']['adult']);
        unset($offer['optional']['downloadable']);
        unset($offer['optional']['rec']);
        return $offer;
    }
}

$c = new offerMedicineYml();
print_r($c->getOffer());
