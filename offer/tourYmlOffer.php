<?php

//namespace DartVadius\YmlGenerator;
//
//use DartVadius\YmlGenerator\abstractYmlOffer;

/**
 * offerTourYml
 *
 * @author DartVadius
 */
class tourYmlOffer extends abstractYmlOffer {

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
        return $this;
    }

    /**
     *
     * @param string $country
     */
    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    /**
     *
     * @param string $region
     */
    public function setRegion($region) {
        $this->region = $region;
        return $this;
    }

    /**
     *
     * @param int $days
     */
    public function setDays($days) {
        if (is_numeric($days)) {
            $this->days = (int) $days;
            return $this;
        }
    }

    /**
     *
     * @param DateTime $date
     */
    public function setDataTour($date) {
        $date = new DateTime($date);
        $this->dataTour = $date->format('Y-m-d h:m:s');
        return $this;
    }

    /**
     *
     * @param string $stars
     */
    public function setHotelStars($stars) {
        $this->hotelStars = $stars;
        return $this;
    }

    /**
     *
     * @param string $room
     */
    public function setRoom($room) {
        $this->room = $room;
        return $this;
    }

    /**
     *
     * @param string $meal
     */
    public function setMeal($meal) {
        $this->meal = $meal;
        return $this;
    }

    /**
     *
     * @param string $included
     */
    public function setIncluded($included) {
        $this->included = $included;
        return $this;
    }

    /**
     *
     * @param string $transport
     */
    public function setTransport($transport) {
        $this->transport = $transport;
        return $this;
    }

    /**
     *
     * @param float $min
     */
    public function setPriceMin($min) {
        $this->priceMin = $min;
        return $this;
    }

    /**
     *
     * @param float $max
     */
    public function setPriceMax($max) {
        $this->priceMax = $max;
        return $this;
    }

    /**
     *
     * @param array $options
     */
    public function setOptions($options) {
        foreach ($options as $option) {
            array_push($this->options, $option);
        }
        return $this;
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
        return $this;
    }

}
