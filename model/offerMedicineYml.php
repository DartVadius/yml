<?php
require_once 'offerYml.php';
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
}
