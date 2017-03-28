<?php
namespace DartVadius\YmlGenerator\model;
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
    public function setName($title) {
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
        return $offer;
    }

}
//
//$c = new offerMediaYml();
//$val = [
//    'url' => 'asddfasdf',
//    'title' => 'name',
//    'artist' => 'elvis'
//];
////$c->setArtist('elvis');
//$c->setAllValues($val);
//print_r($c);
//print_r($c->getOffer());
