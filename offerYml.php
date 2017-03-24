<?php

/**
 * offerYml
 *
 * @author vad
 */
class offerYml {

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
     * @param string $name
     */
    public function setVendor($vendor) {
        $this->vendor = $vendor;
    }

    /**
     *
     * @param string $name
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
    public function setOldPrice ($oldPrice) {
        $this->oldPrice = $oldPrice;
    }

    public function setCurrencyId($currencyId) {
        $this->currencyId = $currencyId;
    }

    
    /**
     * validate id in offer
     *
     * @param string $id
     * @return boolean
     */
    private function idValidate($id) {
        if (ctype_alnum($id) && strlen($id) < 21) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * validate bid, cbid, fee in offer
     * 
     * @param string || int $value
     * @return boolean
     */
    private function bidCbidFeeValidate($value) {
        if (is_numeric($value) && stripos($value, '.') === FALSE && stripos($value, '-') === FALSE) {
            return TRUE;
        }
        return FALSE;
    }

   /**
    * validate price and oldprice in offer
    * 
    * @param float $price
    * @return boolean
    */
    public function priceOldpriceValidate($price) {
        if (is_numeric($price)) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * validate currency Id in offer
     * 
     * @param string $currencyId
     * @return boolean
     */
    public function currencyIdValidate($currencyId) {
        $idArr = ['RUR', 'RUB', 'UAH', 'BYN', 'KZT', 'USD', 'EUR'];        
        if (in_array($currencyId, $idArr)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
//    public function hello() {
//        echo 'hello';
//    }

}
