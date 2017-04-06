<?php
//namespace DartVadius\YmlGenerator;
//
//use DartVadius\YmlGenerator\abstractYmlOffer;

/**
 * offerVendorYml
 *
 * @author DartVadius
 */
class yml_vendorYmlOffer extends yml_abstractYmlOffer {
    
    private $typePrefix = '';

    public function __construct() {
        $this->type = 'vendor.model';
    }
    
    public function getOffer() {
        $offer = parent::getOffer();
        unset($offer['requared']['name']);
        $offer['requared']['model'] = $offer['optional']['model'];
        $offer['requared']['vendor'] = $offer['optional']['vendor'];
        unset($offer['optional']['model']);
        unset($offer['optional']['vendor']);
        return $offer;
    }
    
    public function setTypePrefix($prefix) {
        $this->typePrefix = $prefix;
        return $this;
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
