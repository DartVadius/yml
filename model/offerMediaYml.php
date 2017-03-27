<?php

/**
 * offerMediaYml
 *
 * @author DartVadius
 */
class offerMediaYml extends offerYml {
    
    /**
     *
     * @var string 
     */
    private $artist = '';

    /**
     *
     * @var string 
     */
    private $title = '';
    
    /**
     *
     * @var string 
     */
    private $year = '';
    
    /**
     *
     * @var media
     */
    private $media = '';

    /**
     *
     * @var string 
     */
    private $starring = '';
    
    /**
     *
     * @var string 
     */
    private $director = '';
    
    /**
     *
     * @var string 
     */
    private $originalName = '';
    
    /**
     *
     * @var string
     */
    private $country = '';
    
    public function __construct() {
        $this->type = 'artist.title';
    }
    
    /**
     * 
     * @param string $artist
     */
    public function setArtist($artist) {
        $this->artist = $artist;
    }
    
    /**
     * 
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
    
    /**
     * 
     * @param string $year
     */
    public function setYear($year) {
        $this->year = $year;
    }
    
    /**
     * 
     * @param string $media
     */
    public function setMedia($media) {
        $this->media = $media;
    }
    
    /**
     * 
     * @param string $starring
     */
    public function setStarring($starring) {
        $this->starring = $starring;
    }
    
    /**
     * 
     * @param string $director
     */
    public function setDirector($director) {
        $this->director = $director;
    }
    
    /**
     * 
     * @param string $origin
     */
    public function setOriginalName($origin) {
        $this->originalName = $origin;
    }
    
    /**
     * 
     * @param string $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
    
    public function getOffer() {
        $offer = parent::getOffer();
        unset($offer['requared']['name']);
        unset($offer['requared']['rec']);
        $offer['requared']['title'] = $this->title;
        $offer['optional']['artist'] = $this->artist;
        $offer['optional']['year'] = $this->year;
        $offer['optional']['media'] = $this->media;
        $offer['optional']['starring'] = $this->starring;
        $offer['optional']['director'] = $this->director;
        $offer['optional']['originalName'] = $this->originalName;
        $offer['optional']['country'] = $this->country;
        return $offer;
    }
}
