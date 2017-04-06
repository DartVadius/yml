<?php
//namespace DartVadius\YmlGenerator;
//
//use DartVadius\YmlGenerator\abstractYmlOffer;

/**
 * Description of offerMedicineYml
 *
 * @author DartVadius
 */
class yml_medicineYmlOffer extends yml_abstractYmlOffer {    
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
        unset($offer['optional']['min-quantity']);
        unset($offer['optional']['step-quantity']);
        unset($offer['optional']['manufacturer_warranty']);
        unset($offer['optional']['adult']);
        unset($offer['optional']['downloadable']);
        unset($offer['optional']['rec']);
        unset($offer['optional']['model']);        
        return $offer;
    }
    
    /**
     * Set property values that are not arrays
     * NOTE! for setting array properties, such as $picture, $deliveryOptions, 
     * $outlets, $barcode, $param, $rec your must use their own methods
     * 
     * @param array $values
     */
    public function setAllValues($values) {
        foreach ($values as $key => $value) {
            if (isset($this->$key) && !is_array($value)) {
                $this->$key = $value;
            }
        }
        return $this;
    }
}