<?php

require_once 'functions.php';

/**
 * offerYml
 *
 * @author DartVadius
 */
abstract class offerYml {

    /**
     *
     * @var string 
     */
    protected $type = NULL;
    /**
     *
     * @var string
     */
    protected $name = NULL;

    /**
     *
     * @var string
     */
    protected $model = NULL;

    /**
     *
     * @var string
     */
    protected $vendor = NULL;

    /**
     *
     * @var string
     */
    protected $vendorCode = NULL;

    /**
     * product id
     *
     * @var string
     */
    protected $id = NULL;

    /**
     *
     * @var int
     */
    protected $cbid = NULL;

    /**
     *
     * @var int
     */
    protected $bid = NULL;

    /**
     *
     * @var int
     */
    protected $fee = NULL;

    /**
     * url to product
     *
     * @var string
     */
    protected $url = NULL;

    /**
     *
     * @var type float
     */
    protected $price = NULL;

    /**
     *
     * @var type float
     */
    protected $oldPrice = NULL;

    /**
     *
     * @var string
     */
    protected $currencyId = NULL;

    /**
     *
     * @var int
     */
    protected $categoryId = NULL;

    /**
     *
     * @var array
     */
    protected $picture = [];

    /**
     * Courier delivery
     *
     * @var string
     */
    protected $delivery = NULL;

    /**
     *
     * @var array
     */
    protected $deliveryOptions = [];

    /**
     *
     * @var string
     */
    protected $pickup = NULL;

    /**
     *
     * @var string
     */
    protected $available = NULL;

    /**
     *
     * @var string
     */
    protected $store = NULL;

    /**
     *
     * @var array
     */
    protected $outlets = [];

    /**
     *
     * @var string
     */
    protected $description = NULL;

    /**
     *
     * @var string
     */
    protected $salesNote = NULL;

    /**
     *
     * @var string
     */
    protected $minQuantity = NULL;

    /**
     *
     * @var string
     */
    protected $stepQuantity = NULL;

    /**
     *
     * @var string
     */
    protected $manufacturerWarranty = NULL;

    /**
     *
     * @var string
     */
    protected $countryOfOrigin = NULL;

    /**
     *
     * @var type
     */
    protected $adult = NULL;

    /**
     *
     * @var array
     */
    protected $barcode = [];

    /**
     * Participation of commodity offers in the program "Ordering on the Market"
     * @var integer (0, 1)
     */
    protected $cpa = 1;

    /**
     *
     * @var array
     */
    protected $param = [];

    /**
     *
     * @var string
     */
    protected $weight = NULL;

    /**
     *
     * @var string
     */
    protected $dimensions = NULL;

    /**
     *
     * @var string
     */
    protected $downloadable = NULL;

    /**
     *
     * @var array
     */
    protected $rec = [];

    /**
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     *
     * @param string $name
     */
    public function setModel($model) {
        $this->model = $model;
    }

    /**
     *
     * @param string $vendor
     */
    public function setVendor($vendor) {
        $this->vendor = $vendor;
    }

    /**
     *
     * @param string $vendorCode
     */
    public function setVendorCode($vendorCode) {
        $this->vendorCode = $vendorCode;
    }

    /**
     *
     * @param string $name
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     *
     * @param string $bid
     */
    public function setBid($bid) {
        $this->bid = $bid;
    }

    /**
     *
     * @param string $cbid
     */
    public function setCbid($cbid) {
        $this->cbid = $cbid;
    }

    /**
     *
     * @param string $fee
     */
    public function setFee($fee) {
        $this->fee = $fee;
    }

    /**
     *
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /**
     *
     * @param float $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     *
     * @param float $oldPrice
     */
    public function setOldPrice($oldPrice) {
        $this->oldPrice = $oldPrice;
    }

    /**
     *
     * @param string $currencyId
     */
    public function setCurrencyId($currencyId) {
        $this->currencyId = $currencyId;
    }

    /**
     *
     * @param string || int $id
     */
    public function setCategoryId($id) {
        $this->categoryId = $id;
    }

    /**
     *
     * @param string $arr
     */
    public function setPicture($arr) {
        foreach ($arr as $pic) {
            array_push($this->picture, $pic);
        }
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setDelivery($val) {
        if ($val == 'true' || $val == 'false') {
            $this->delivery = $val;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param string || array $cost delivery cost or array with delivery data
     * @param string $days delivery terms
     * @param string $before Time of registration of the order, before which the specified terms and conditions of delivery are valid
     * @throws Exception
     */
    public function setDeliveryOptions($cost, $days = NULL, $before = NULL) {
        if (is_array($cost)) {
            foreach ($cost as $value) {
                $arr = [];
                if (!empty($value[0]) && is_numeric($value[0]) && !empty($value[1]) && is_numeric($value[1])) {
                    $arr['cost'] = $value[0];
                    $arr['days'] = $value[1];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (!empty($value[2])) {
                    $arr['before'] = $value[2];
                }
                array_push($this->deliveryOptions, $arr);
            }
        } else {
            $arr = [];
            $arr['cost'] = $cost;
            if (!empty($days)) {
                $arr['days'] = $days;
            } else {
                throw new Exception('Required fields are undefined');
            }
            if (!empty($before)) {
                $arr['before'] = $before;
            }
            array_push($this->deliveryOptions, $arr);
        }
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setPickup($val) {
        if ($val == 'true' || $val == 'false') {
            $this->pickup = $val;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setAvailable($val) {
        if ($val == 'true' || $val == 'false') {
            $this->available = $val;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setStore($val) {
        if ($val == 'true' || $val == 'false') {
            $this->store = $val;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param string || array $id
     * @param string $instock
     * @param string $booking
     * @throws Exception
     */
    public function setOutlets($id, $instock = NULL, $booking = NULL) {
        if (is_array($id)) {
            foreach ($id as $value) {
                $arr = [];
                if (!empty($value[0])) {
                    $arr['id'] = $value[0];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (!empty($value[1]) && is_numeric($value[1]) && stripos($value[1], '.') === FALSE) {
                    $arr['instock'] = $value[1];
                }
                if (!empty($value[2]) && ($value[2] == 'true' || $value[2] == 'false')) {
                    $arr['booking'] = $value[2];
                }
                array_push($this->outlets, $arr);
            }
        } else {
            $arr = [];
            $arr['id'] = $id;
            if (!empty($instock) && is_numeric($instock) && stripos($instock, '.') === FALSE) {
                $arr['instock'] = $instock;
            }
            if (!empty($booking && ($booking == 'true' || $booking == 'false'))) {
                $arr['booking'] = $booking;
            }            
            array_push($this->outlets, $arr);
        }
    }

    /**
     *
     * @param string $desc
     */
    public function setDescription($desc) {
        $this->description = $desc;
    }

    /**
     *
     * @param string $desc
     */
    public function salesNote($desc) {
        $this->salesNote = $desc;
    }

    /**
     *
     * @param sting || int $num
     */
    public function setMinQuantity($num) {
        $this->minQuantity = $num;
    }

    /**
     *
     * @param string $num
     */
    public function setStepQuantity($num) {
        $this->stepQuantity = $num;
    }

    /**
     *
     * @param string $value
     * @return boolean
     */
    public function setManufacturerWarranty($value) {
        if ($val == 'true' || $val == 'false') {
            $this->manufacturerWarranty = $val;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param string $country
     */
    public function setCountryOfOrigin($country) {
        $this->countryOfOrigin = $country;
    }

    /**
     *
     * @param string $value
     * @return boolean
     */
    public function setAdult($value) {
        if ($val == 'true') {
            $this->adult = $val;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param sting || array $code
     */
    public function setBarcode($code) {
        if (is_array($code)) {
            foreach ($code as $val) {
                array_push($this->barcode, $code);
            }
        } else {
            array_push($this->barcode, $code);
        }
    }

    /**
     *
     * @param int $val
     * @throws Exception
     */
    public function setCPA($val) {
        if ($val === 1 || $val === 0) {
            $this->cpa = $val;
        } else {
            throw new Exception('Uncorrect value');
        }
    }
    
    /**
     * 
     * @param string || array $param
     * @param string $name
     * @param string $unit
     * @throws Exception
     */
    public function setParams($param, $name = NULL, $unit = NULL) {
        if (is_array($param)) {
            foreach ($param as $value) {
                $arr = [];
                if (!empty($value[0]) && !empty($value[1])) {
                    $arr['title'] = $value[0];
                    $arr['name'] = $value[1];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (!empty($value[2])) {
                    $arr['unit'] = $value[2];
                }
                array_push($this->param, $arr);
            }
        } else {
            $arr = [];
            $arr['title'] = $param;
            if (!empty($name)) {
                $arr['name'] = $name;
            } else {
                throw new Exception('Required fields are undefined');
            }
            if (!empty($unit)) {
                $arr['unit'] = $unit;
            }
            array_push($this->param, $arr);
        }
    }
    
    /**
     * 
     * @param string $kg
     */
    public function setWeight($kg) {
        if (is_numeric($kg)) {
            $this->weight = $kg;
        }
        return FALSE;
    }

    /**
     *     
     * @param array $dim required 3 numbers 
     */
    public function setDimensions($dim) {
        if (count($dim) != 3) {
            throw new Exception('Wrong number of vallues');
        }
        foreach ($dim as $value) {
            if (!is_numeric($value)) {
                throw new Exception('Wrong type of vallue');
            }
        }
        $this->dimensions = trim(implode('/', $dim));
    }
    
    /**
     * 
     * @param string $value
     */
    public function setDownloadable($value) {
        if ($value == 'true') {
            $this->downloadable = $value;
        }
    }

    /**
     * 
     * @param array $rec
     * @throws Exception
     */
    public function setRec($rec) {
        if (count($rec) > 30) {
            throw new Exception('Too much values');
        }
        foreach ($rec as $value) {
            if (!ctype_alnum($value)) {
                throw new Exception('Wrong vallue');
            }
        }
        $this->rec = trim(implode(',', $rec));
    }

    
//    public function hello() {
//        echo 'hello';
//    }

}