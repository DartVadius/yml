<?php
namespace DartVadius\YmlGenerator\offer;

/**
 * yml header
 *
 * @author DartVadius
 */
class HeadYmlOffer {

    /**
     * params loaded from config file
     * @var array
     */
    private $params = [];
    /**
     *
     * @var string 
     */
    private $encode = 'UTF-8';
    /**
     * short company name
     * @var string
     */
    private $name = '';

    /**
     * full company name
     * @var string
     */
    private $company = '';

    /**
     * url to the shop main page
     * @var string
     */
    private $url = '';

    /**
     * CMS name
     * @var string
     */
    private $platform = '';

    /**
     * CMS version
     * @var string
     */
    private $version = '';

    /**
     * The name of the agency that provides technical support to the store
     * @var string
     */
    private $agency = '';

    /**
     * email of CRM developers or technical support agency
     * @var string
     */
    private $email = '';

    /**
     * List of currencies used in the store
     * @var array
     */
    private $currencies = [];

    /**
     * List of product categories
     * @var array
     */
    private $categories = [];

    /**
     * Tariffs and terms of delivery in your region
     * @var array
     */
    private $deliveryOptions = [];

    /**
     * Participation of commodity offers in the program "Ordering on the Market"
     * @var integer (0, 1)
     */
    private $cpa = 1;

    /**
     *
     * @var string
     */
    private $adult = NULL;

    public function __construct() {
        if (file_exists(__DIR__ . '/config/config.php')) {
            $this->params = require_once (__DIR__ . '/config/config.php');
            foreach ($this->params['required'] as $key => $value) {
                if (!empty($value)) {
                    if (is_array($value)) {
                        $newArr = [];
                        foreach ($value as $arrKey => $arrValue) {
                            $newArr[$arrKey] = $arrValue;
                        }
                        $this->$key = $newArr;
                    } else {
                        $this->$key = $value;
                    }
                }
                
            }
            foreach ($this->params['optional'] as $key => $value) {
                if (!empty($value)) {
                    if (is_array($value)) {
                        $newArr = [];
                        foreach ($value as $arrKey => $arrValue) {
                            $newArr[$arrKey] = $arrValue;
                        }
                        $this->$key = $newArr;
                    } else {
                        $this->$key = $value;
                    }
                }
                
            }
        }
    }

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
     * @param string $company
     */
    public function setCompany($company) {
        $this->company = $company;
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
     * @param string $platform
     */
    public function setPlatform($platform) {
        $this->platform = $platform;
        return $this;
    }

    /**
     *
     * @param string $version
     */
    public function setVersion($version) {
        $this->version = $version;
        return $this;
    }

    /**
     *
     * @param string $agency
     */
    public function setAgency($agency) {
        $this->agency = $agency;
        return $this;
    }

    /**
     *
     * @param string $email
     * @return boolean if an incorrect email
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @param string $name
     * @param string $value
     */
    public function setCurrencies($name, $value) {
        $this->currencies[$name] = $value;
        return $this;
    }

    /**
     * There are 2 ways to set the values of categories:
     * through variables or as an array like this
     * [
     *  ['cat1', 2, 5], //category name, category id, category parent id
     *  ['cat2', 3], //in this case parent id undefined
     *  ['cat3', 4, 1],
     * ];
     *
     * @param string || array $name category name or array with categories data
     * @param string $id category id
     * @param string $parentId parent category id
     * @throws Exception
     */
    public function setCategory($name, $id = NULL, $parentId = NULL) {
        if (is_array($name)) {
            foreach ($name as $value) {
                if (!empty($value[1]) && !empty($value[0])) {
                    $this->categories[$value[0]]['id'] = $value[1];
                } else {
                    throw new Exception('Category: Required fields are undefined');
                }
                if (!empty($value[2])) {
                    $this->categories[$value[0]]['parentId'] = $value[2];
                }
            }
        } else {
            if (!empty($id)) {
                $this->categories[$name]['id'] = $id;
            } else {
                throw new Exception('Category ID undefined');
            }
            $this->categories[$name]['parentId'] = $parentId;
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
                if (!empty($value[0]) && is_numeric($value[0]) && !empty($value[1])) {
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
        return $this;
    }

    /**
     *
     * @param int $val
     * @throws Exception
     */
    public function setCPA($val) {
        if ($val == 1 || $val == 0) {
            $this->cpa = $val;
        }
        return $this;
    }

    /**
     *
     * @param string $value
     * @return boolean
     */
    public function setAdult($value) {
        if ($value == 'false' || $value == 'true') {
            $this->adult = $value;
        }
        return $this;
    }
    
    /**
     * Set property values that are not arrays
     * NOTE! for setting array properties your must use their own methods
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
    
    /**
     * returns array of header properties prepared for using in yml generator
     * 
     * @return array
     */
    public function getHead() {
        $head = [];
        $head['requared']['encode'] = $this->encode;
        $head['requared']['name'] = $this->name;
        $head['requared']['company'] = $this->company;
        $head['requared']['url'] = $this->url;
        $head['requared']['currencies'] = $this->currencies;
        $head['requared']['categories'] = $this->categories;
        $head['optional']['platform'] = $this->platform;
        $head['optional']['version'] = $this->version;
        $head['optional']['agency'] = $this->agency;
        $head['optional']['email'] = $this->email;
        $head['optional']['delivery-options'] = $this->deliveryOptions;
        $head['optional']['cpa'] = $this->cpa;
        $head['optional']['adult'] = $this->adult;
        return $head;
    }

}