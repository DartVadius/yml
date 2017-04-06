<?php
//namespace DartVadius\YmlGenerator;

/**
 * offerYml
 *
 * @author DartVadius
 */
abstract class yml_abstractYmlOffer {

    /**
     *
     * @var string 
     */
    protected $type = '';
    /**
     *
     * @var string
     */
    protected $name = '';

    /**
     *
     * @var string
     */
    protected $model = '';

    /**
     *
     * @var string
     */
    protected $vendor = '';

    /**
     *
     * @var string
     */
    protected $vendorCode = '';

    /**
     * product id
     *
     * @var string
     */
    protected $id = '';

    /**
     *
     * @var int
     */
    protected $cbid = '';

    /**
     *
     * @var int
     */
    protected $bid = '';

    /**
     *
     * @var int
     */
    protected $fee = '';

    /**
     * url to product
     *
     * @var string
     */
    protected $url = '';

    /**
     *
     * @var type float
     */
    protected $price = '';

    /**
     *
     * @var type float
     */
    protected $oldPrice = '';

    /**
     *
     * @var string
     */
    protected $currencyId = '';

    /**
     *
     * @var int
     */
    protected $categoryId = '';

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
    protected $delivery = '';

    /**
     *
     * @var array
     */
    protected $deliveryOptions = [];

    /**
     *
     * @var string
     */
    protected $pickup = '';

    /**
     *
     * @var string
     */
    protected $available = '';

    /**
     *
     * @var string
     */
    protected $store = '';

    /**
     *
     * @var array
     */
    protected $outlets = [];

    /**
     *
     * @var string
     */
    protected $description = '';

    /**
     *
     * @var string
     */
    protected $salesNote = '';

    /**
     *
     * @var string
     */
    protected $minQuantity = '';

    /**
     *
     * @var string
     */
    protected $stepQuantity = '';

    /**
     *
     * @var string
     */
    protected $manufacturerWarranty = '';

    /**
     *
     * @var string
     */
    protected $country_of_origin = '';

    /**
     *
     * @var type
     */
    protected $adult = '';

    /**
     *
     * @var array
     */
    protected $barcode = [];

    /**
     * Participation of commodity offers in the program "Ordering on the Market"
     * @var integer (0, 1)
     */
    protected $cpa = '';

    /**
     *
     * @var array
     */
    protected $param = [];

    /**
     *
     * @var string
     */
    protected $weight = '';

    /**
     *
     * @var string
     */
    protected $dimensions = '';

    /**
     *
     * @var string
     */
    protected $downloadable = '';

    /**
     *
     * @var array
     */
    protected $rec = '';

    
    /**
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @param string $name
     */
    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    /**
     *
     * @param string $vendor
     */
    public function setVendor($vendor) {
        $this->vendor = $vendor;
        return $this;
    }

    /**
     *
     * @param string $vendorCode
     */
    public function setVendorCode($vendorCode) {
        $this->vendorCode = $vendorCode;
        return $this;
    }

    /**
     *
     * @param string $name
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param string $bid
     */
    public function setBid($bid) {
        $this->bid = $bid;
        return $this;
    }

    /**
     *
     * @param string $cbid
     */
    public function setCbid($cbid) {
        $this->cbid = $cbid;
        return $this;
    }

    /**
     *
     * @param string $fee
     */
    public function setFee($fee) {
        $this->fee = $fee;
        return $this;
    }

    /**
     *
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     *
     * @param float $price
     */
    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    /**
     *
     * @param float $oldPrice
     */
    public function setOldPrice($oldPrice) {
        $this->oldPrice = $oldPrice;
        return $this;
    }

    /**
     *
     * @param string $currencyId
     */
    public function setCurrencyId($currencyId) {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     *
     * @param string || int $id
     */
    public function setCategoryId($id) {
        $this->categoryId = $id;
        return $this;
    }

    /**
     *
     * @param array $arr array with url's to pictures of product
     */
    public function setPicture($arr) {
        foreach ($arr as $pic) {
            $this->picture[] = $pic;
        }
        return $this;
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setDelivery($val) {
        if ($val == 'true' || $val == 'false') {
            $this->delivery = $val;
        } 
        return $this;
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
                if (!empty($value[0]) && is_numeric($value[0]) && isset($value[1])) {
                    $arr['cost'] = $value[0];
                    $arr['days'] = $value[1];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (isset($value[2])) {
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
        return $this;
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setPickup($val) {
        if ($val == 'true' || $val == 'false') {
            $this->pickup = $val;
        }
        return $this;
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setAvailable($val) {
        if ($val == 'true' || $val == 'false') {
            $this->available = $val;
        } 
        return $this;
    }

    /**
     *
     * @param string $val
     * @return boolean
     */
    public function setStore($val) {
        if ($val == 'true' || $val == 'false') {
            $this->store = $val;
        }
        return $this;
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
                if (isset($value[0])) {
                    $arr['id'] = $value[0];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (isset($value[1]) && is_numeric($value[1]) && stripos($value[1], '.') === FALSE) {
                    $arr['instock'] = $value[1];
                }
                if (isset($value[2]) && ($value[2] == 'true' || $value[2] == 'false')) {
                    $arr['booking'] = $value[2];
                }
                array_push($this->outlets, $arr);
            }
        } else {
            $arr = [];
            $arr['id'] = $id;
            if (isset($instock) && is_numeric($instock) && stripos($instock, '.') === FALSE) {
                $arr['instock'] = $instock;
            }
            if (isset($booking) && ($booking == 'true' || $booking == 'false')) {
                $arr['booking'] = $booking;
            }            
            array_push($this->outlets, $arr);
        }
        return $this;
    }

    /**
     *
     * @param string $desc
     */
    public function setDescription($desc) {
        $this->description = $desc;
        return $this;
    }

    /**
     *
     * @param string $desc
     */
    public function salesNote($desc) {
        $this->salesNote = $desc;
        return $this;
    }

    /**
     *
     * @param sting || int $num
     */
    public function setMinQuantity($num) {
        $this->minQuantity = $num;
        return $this;
    }

    /**
     *
     * @param string $num
     */
    public function setStepQuantity($num) {
        $this->stepQuantity = $num;
        return $this;
    }

    /**
     *
     * @param string $value
     * @return boolean
     */
    public function setManufacturerWarranty($value) {
        if ($val == 'true' || $val == 'false') {
            $this->manufacturerWarranty = $val;
        }
        return $this;
    }

    /**
     *
     * @param string $country
     */
    public function setCountryOfOrigin($country) {
        $this->countryOfOrigin = $country;
        return $this;
    }

    /**
     *
     * @param string $value
     * @return boolean
     */
    public function setAdult($value) {
        if ($val == 'true') {
            $this->adult = $val;
        }
        return $this;
    }

    /**
     * 
     * @param sting || array $code
     */
    public function setBarcode($code) {
        if (is_array($code)) {
            foreach ($code as $val) {
                array_push($this->barcode, $val);
            }
        } else {
            array_push($this->barcode, $code);
        }
        return $this;
    }

    /**
     *
     * @param int $val
     * @throws Exception
     */
    public function setCPA($val) {
        if ($val === 1 || $val === 0) {
            $this->cpa = $val;
        }
        return $this;
    }
    
    /**
     * 
     * @param string || array $param (['parameter', 'name', 'unit'])
     * @param string $name
     * @param string $unit
     * @throws Exception
     */
    public function setParams($param, $name = NULL, $unit = NULL) {
        if (is_array($param)) {
            foreach ($param as $value) {
                $arr = [];
                if (isset($value[0]) && isset($value[1])) {
                    $arr['title'] = $value[0];
                    $arr['name'] = $value[1];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (isset($value[2])) {
                    $arr['unit'] = $value[2];
                }
                $this->param[] = $arr;
            }
        } else {
            $arr = [];
            $arr['title'] = $param;
            if (isset($name)) {
                $arr['name'] = $name;
            } else {
                throw new Exception('Required fields are undefined');
            }
            if (isset($unit)) {
                $arr['unit'] = $unit;
            }
            $this->param[] = $arr;
        }
        return $this;
    }
    
    /**
     * 
     * @param string $kg
     */
    public function setWeight($kg) {
        if (is_numeric($kg)) {
            $this->weight = $kg;
        }
        return $this;
    }

    /**
     *     
     * @param array $dim required 3 numbers 
     */
    public function setDimensions($dim) {
        if (count($dim) != 3) {
            throw new Exception('Wrong number of values');
        }
        foreach ($dim as $value) {
            if (!is_numeric($value)) {
                throw new Exception('Wrong type of value');
            }
        }
        $this->dimensions = trim(implode('/', $dim));
        return $this;
    }
    
    /**
     * 
     * @param string $value
     */
    public function setDownloadable($value) {
        if ($value == 'true') {
            $this->downloadable = $value;
            return $this;
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
                throw new Exception('Wrong value');
            }
        }
        $this->rec = trim(implode(',', $rec));
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
    
    public function getOffer() {
        $offer = [];
        $offer['requared']['name'] = $this->name;
        $offer['requared']['id'] = $this->id;
        $offer['requared']['type'] = $this->type;
        $offer['requared']['url'] = $this->url;
        $offer['requared']['price'] = $this->price;
        $offer['requared']['currencyId'] = $this->currencyId;
        $offer['requared']['categoryId'] = $this->categoryId;
        $offer['requared']['picture'] = $this->picture; //array
        $offer['optional']['model'] = $this->model;
        $offer['optional']['vendor'] = $this->vendor;
        $offer['optional']['vendorCode'] = $this->vendorCode;
        $offer['optional']['cbid'] = $this->cbid;
        $offer['optional']['bid'] = $this->bid;
        $offer['optional']['fee'] = $this->fee;
        $offer['optional']['oldprice'] = $this->oldPrice;
        $offer['optional']['delivery'] = $this->delivery;
        $offer['optional']['delivery-options'] = $this->deliveryOptions; //array
        $offer['optional']['available'] = $this->available;
        $offer['optional']['store'] = $this->store;
        $offer['optional']['outlets'] = $this->outlets; //array
        $offer['optional']['description'] = $this->description;
        $offer['optional']['sales_notes'] = $this->salesNote;
        $offer['optional']['min-quantity'] = $this->minQuantity;
        $offer['optional']['step-quantity'] = $this->stepQuantity;
        $offer['optional']['manufacturer_warranty'] = $this->manufacturerWarranty;
        $offer['optional']['country_of_origin'] = $this->country_of_origin;
        $offer['optional']['adult'] = $this->adult;
        $offer['optional']['barcode'] = $this->barcode; //arary
        $offer['optional']['cpa'] = $this->cpa;
        $offer['optional']['param'] = $this->param; //array
        $offer['optional']['weight'] = $this->weight;
        $offer['optional']['dimensions'] = $this->dimensions;
        $offer['optional']['downloadable'] = $this->downloadable;
        $offer['optional']['rec'] = $this->rec;
        return $offer;
    }
}