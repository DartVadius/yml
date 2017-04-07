<?php
namespace DartVadius\YmlGenerator\offer;

use DartVadius\YmlGenerator\offer\AbstractYmlOffer;

/**
 * MediaYmlOffer media type of YandexMarket offer (artist.title)
 *
 * @author DartVadius
 */
class MediaYmlOffer extends AbstractYmlOffer {

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
        return $this;
    }

    /**
     * 
     * @param string $title
     */
    public function setName($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * 
     * @param string $year
     */
    public function setYear($year) {
        $this->year = $year;
        return $this;
    }

    /**
     * 
     * @param string $media
     */
    public function setMedia($media) {
        $this->media = $media;
        return $this;
    }

    /**
     * 
     * @param string $starring
     */
    public function setStarring($starring) {
        $this->starring = $starring;
        return $this;
    }

    /**
     * 
     * @param string $director
     */
    public function setDirector($director) {
        $this->director = $director;
        return $this;
    }

    /**
     * 
     * @param string $origin
     */
    public function setOriginalName($origin) {
        $this->originalName = $origin;
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
        if (!empty($this->name)) {
            $this->title = $this->name;
        }
        return $this;
    }

    public function getOffer() {
        $offer = parent::getOffer();
        unset($offer['requared']['name']);
        unset($offer['requared']['rec']);
        unset($offer['optional']['model']);
        unset($offer['optional']['vendor']);
        unset($offer['optional']['vendorCode']);
        $offer['requared']['title'] = $this->title;
        $offer['optional']['artist'] = $this->artist;
        $offer['optional']['year'] = $this->year;
        $offer['optional']['media'] = $this->media;
        $offer['optional']['starring'] = $this->starring;
        $offer['optional']['director'] = $this->director;
        $offer['optional']['originalName'] = $this->originalName;
        $offer['optional']['country'] = $this->country;
        foreach ($offer['requared'] as $req) {
            if ($req == '') {
                return FALSE;
            }
        }
        return $offer;
    }

}