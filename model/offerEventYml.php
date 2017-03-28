<?php
namespace DartVadius\YmlGenerator\model;
/**
 * offerEventYml
 *
 * @author DartVadius
 */
class offerEventYml extends offerYml {
    
    /**
     *
     * @var string 
     */
    private $place = '';

    /**
     *
     * @var string 
     */
    private $hall = '';
    
    /**
     *
     * @var string 
     */
    private $hallPart = '';
    
    /**
     *
     * @var date 
     */
    private $date = '';
    
    /**
     *
     * @var string 
     */
    private $isPremiere = '';
    
    /**
     *
     * @var stirng
     */
    private $isKids = '';

    public function __construct() {
        $this->type = 'event-ticket';
    }
    
    /**
     * 
     * @param string $place
     */
    public function setPlace($place) {
        $this->place = $place;
    }
    
    /**
     * 
     * @param string $hall
     */
    public function setHall($hall) {
        $this->hall = $hall;
    }
    
    /**
     * 
     * @param string $part
     */
    public function setHallPart($part) {
        $this->hallPart = $part;
    }
    
    /**
     * 
     * @param DateTime $date
     */
    public function setDate ($date) {
        $date = new DateTime($date);
        $this->date = $date->format('Y-m-d h:m:s');
    }
    
    /**
     * 
     * @param string $val
     */
    public function setIsPremiere($val) {
        if ($val === 0 || $val === 1) {
            $this->isPremiere = $val;
        } else {
            throw new Exception('Uncorrect value');
        }        
    }
    
    /**
     * 
     * @param int $val
     */
    public function setIsKids($val) {
        if ($val === 0 || $val === 1) {
            $this->isKids = $val;
        } else {
            throw new Exception('Uncorrect value');
        }
    }
    
    public function getOffer() {
        $offer = parent::getOffer();
        $offer['requared']['place'] = $this->place;
        $offer['requared']['date'] = $this->date;
        $offer['optional']['hall'] = $this->hall;
        $offer['optional']['hall_part'] = $this->hallPart;
        $offer['optional']['is_premiere'] = $this->isPremiere;
        $offer['optional']['is_kids'] = $this->isKids;
        unset($offer['optional']['model']);
        unset($offer['optional']['vendor']);
        unset($offer['optional']['vendorCode']);
        unset($offer['optional']['rec']);
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