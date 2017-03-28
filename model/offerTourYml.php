<?php
namespace DartVadius\YmlGenerator\model;
/**
 * offerTourYml
 *
 * @author DartVadius
 */
class offerTourYml extends offerYml {
    
    /**
     *
     * @var string 
     */
    private $worldRegion = '';
    /**
     *
     * @var string
     */
    private $country = '';
    
    /**
     *
     * @var string 
     */
    private $region = '';

    /**
     *
     * @var int
     */
    private $days = '';

    /**
     *
     * @var dateTime
     */
    private $dataTour = '';
    
    /**
     *
     * @var string
     */
    private $hotelStars = '';

    /**
     *
     * @var string
     */
    private $room = '';

    /**
     *
     * @var string
     */
    private $meal = '';
    
    /**
     *
     * @var string
     */
    private $included = '';

    /**
     *
     * @var string
     */
    private $transport = '';

    /**
     *
     * @var float
     */
    private $priceMin = '';
    
    /**
     *
     * @var float
     */
    private $priceMax = '';
    
    /**
     *
     * @var array
     */
    private $options = [];

    public function __construct() {
        $this->type = 'tour';
    }
    
    /**
     * 
     * @param string $region
     */
    public function setWorldRegion($region) {
        $this->worldRegion = $region;
    }
    
    /**
     * 
     * @param string $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
    
    /**
     * 
     * @param string $region
     */
    public function setRegion($region) {
        $this->region = $region;
    }

        /**
     * 
     * @param int $days
     */
    public function setDays($days) {
        if (is_numeric($days)) {
            $this->days = (int)$days;
        }
    }
    
    /**
     * 
     * @param DateTime $date
     */
    public function setDataTour ($date) {
        $date = new DateTime($date);
        $this->dataTour = $date->format('Y-m-d h:m:s');
    }
    
    /**
     * 
     * @param string $stars
     */
    public function setHotelStars($stars) {
        $this->hotelStars = $stars;
    }
    
    /**
     * 
     * @param string $room
     */
    public function setRoom($room) {
        $this->room = $room;
    }
    
    /**
     * 
     * @param string $meal
     */
    public function setMeal($meal) {
        $this->meal = $meal;
    }
    
    /**
     * 
     * @param string $included
     */
    public function setIncluded($included) {
        $this->included = $included;
    }
    
    /**
     * 
     * @param string $transport
     */
    public function setTransport ($transport) {
        $this->transport = $transport;
    }
    
    /**
     * 
     * @param float $min
     */
    public function setPriceMin($min) {
        $this->priceMin = $min;
    }
    
    /**
     * 
     * @param float $max
     */
    public function setPriceMax($max) {
        $this->priceMax = $max;
    }
    
    /**
     * 
     * @param array $options
     */
    public function setOptions($options) {
        foreach ($options as $option) {
            array_push($this->options, $option);
        }
    }
    
    public function getOffer() {
        $offer = parent::getOffer();
        unset($offer['optional']['rec']);
        unset($offer['optional']['model']);
        unset($offer['optional']['vendor']);
        unset($offer['optional']['vendorCode']);
        $offer['requared']['days'] = $this->days;
        $offer['requared']['included'] = $this->included;
        $offer['requared']['transport'] = $this->transport;
        $offer['optional']['worldRegion'] = $this->worldRegion;
        $offer['optional']['country'] = $this->country;
        $offer['optional']['region'] = $this->region;
        $offer['optional']['dataTour'] = $this->dataTour;
        $offer['optional']['hotel_stars'] = $this->hotelStars;
        $offer['optional']['room'] = $this->room;
        $offer['optional']['meal'] = $this->meal;
        $offer['optional']['price_min'] = $this->priceMin;
        $offer['optional']['price_max'] = $this->priceMax;
        $offer['optional']['options'] = $this->options;
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
    }
}
