<?php

/**
 * yml header
 *
 * @author vad
 */
class ymlHead {

    /**
     * params loaded from config file
     * @var array
     */
    private $params = [];

    /**
     * short company name
     * @var string
     */
    private $name = NULL;

    /**
     * full company name
     * @var string
     */
    private $company = NULL;

    /**
     * url to the shop main page
     * @var string
     */
    private $url = NULL;

    /**
     * CMS name
     * @var string
     */
    private $platform = NULL;

    /**
     * CMS version
     * @var string
     */
    private $version = NULL;

    /**
     * The name of the agency that provides technical support to the store
     * @var string
     */
    private $agency = NULL;

    /**
     * email of CRM developers or technical support agency
     * @var string
     */
    private $email = NULL;

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

    public function __construct() {
        $this->params = require_once (__DIR__ . '/config/config.php');
        foreach ($this->params['required'] as $key => $value) {
            if (is_array($value)) {
                $newArr = [];
                foreach ($value as $arrKey => $arrValue) {
                    if ($this->currencieValidate($arrKey, $arrValue)) {
                        $newArr[$arrKey] = $arrValue;
                    } else {
                        throw new Exception('Incorrect currency values');
                    }
                }
                $this->$key = $newArr;
            } else {
                $this->$key = $value;
            }
        }
    }

    /**
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     *
     * @param string $company
     */
    public function setCompany($company) {
        $this->company = $company;
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
     * @param string $platform
     */
    public function setPlatform($platform) {
        $this->platform = $platform;
    }

    /**
     *
     * @param string $version
     */
    public function setVersion($version) {
        $this->version = $version;
    }

    /**
     *
     * @param string $agency
     */
    public function setAgency($agency) {
        $this->agency = $agency;
    }

    /**
     *
     * @param string $email
     * @return boolean if an incorrect email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     *
     * @param string $name
     * @param string $value
     */
    public function setCurrencies($name, $value) {
        $this->currencies[$name] = $value;
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
                    throw new Exception('Required fields are undefined');
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
    }

    /**
     * 
     * @param string || array $cost delivery cost or array with delivery data
     * @param string $days delivery terms
     * @param string $before Time of registration of the order, before which the specified terms and conditions of delivery are valid
     * @throws Exception
     */
    public function setDeliveryOptions($cost, $days = NULL, $before = NULL) {
        $arr = [];
        if (is_array($cost)) {
            foreach ($cost as $value) {
                if (!empty($value[0]) && !empty($value[1]) && is_numeric($value[0])) {
                    $arr['cost'] = $value[0];
                    $arr['days'] = $value[1];
                } else {
                    throw new Exception('Required fields are undefined');
                }
                if (!empty($value[2])) {
                    $arr['order'] = $value[2];
                }
                array_push($this->deliveryOptions, $arr);
            }
        } else {
            $arr['days'] = $days;
            $arr['before'] = $before;
            $arr['cost'] = $cost;
            array_push($this->deliveryOptions, $arr);
        }
    }

    /**
     * 
     * @param string $name
     * @return boolean
     */
    private function nameValidate($name) {
        if (strlen($name) > 20) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     *
     * @param string $id
     * @param string $value
     * @return boolean
     */
    private function currencieValidate($id, $value) {
        $idArr = ['RUR', 'RUB', 'UAH', 'BYN', 'KZT', 'USD', 'EUR'];
        $valueArr = ['CBRF', 'NBU', 'CB', 'NBK'];
        if ((is_numeric($value) || in_array($value, $valueArr)) && in_array($id, $idArr)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param string $email
     * @return boolean
     */
    private function emailValidate($email) {
        $s = '"';
        if (preg_match("/^(\w+([\.\w+])*)@\w+(\.\w+)?\.\w{2,3}$/i", $email) || preg_match("/^$s{1}.+$s{1}@\w+(\.\w+)?\.\w{2,3}$/i", $email)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * validate type of variables and connections to parent categories
     * 
     * @param array $categories
     * @return boolean
     */
    private function categoryValidate($categories) {
        $id = [];
        foreach ($categories as $category) {
            if (!empty($category['id']) && is_numeric($category['id'])) {
                array_push($id, $category['id']);
            } else {
                return FALSE;
            }
        }
        foreach ($categories as $category) {
            if (!empty($category['parentId']) && !in_array($category['parentId'], $id)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     * 
     * @param array $delivery
     * @return boolean
     */
    private function deliveryValidate($delivery) {
        if (count($delivery) > 5) {
            return FALSE;
        }
        foreach ($delivery as $option) {
            if (!is_numeric($option['cost']) || stripos($option['cost'], '.') !== FALSE) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function valid() {
        var_dump($this->categoryValidate($this->categories));
    }

}

$s = new ymlHead();
$s->setCurrencies('USD', '22.5');
$g = [
    ['name', 1, 3],
    ['name2', 3],
    ['name3', 4, 1],
];
$cost = [
    [500, '2-4', '15'],
    [750, 7],
    [800],
    ['1000', 25, '7']
];
$s->setDeliveryOptions($cost);
//$s->setCategory($g);
//$s->valid();

print_r($s);
