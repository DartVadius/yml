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
    private $artist = NULL;

    /**
     *
     * @var string 
     */
    private $title = NULL;
    
    /**
     *
     * @var string 
     */
    private $year = NULL;
    
    /**
     *
     * @var media
     */
    private $media = NULL;

    /**
     *
     * @var string 
     */
    private $starring = NULL;
    
    /**
     *
     * @var string 
     */
    private $director = NULL;
    
    /**
     *
     * @var string 
     */
    private $originalName = NULL;
    
    /**
     *
     * @var string
     */
    private $country = NULL;
    
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
}
