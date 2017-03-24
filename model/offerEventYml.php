<?php
require_once 'offerYml.php';
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
    private $place = NULL;

    /**
     *
     * @var string 
     */
    private $hall = NULL;
    
    /**
     *
     * @var string 
     */
    private $hallPart = NULL;
    
    /**
     *
     * @var date 
     */
    private $date = NULL;
    
    /**
     *
     * @var string 
     */
    private $isPremiere = NULL;
    
    /**
     *
     * @var stirng
     */
    private $isKids = NULL;

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
}