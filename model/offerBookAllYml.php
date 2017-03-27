<?php

/**
 * offerBookAllYml
 *
 * @author DartVadius
 */
abstract class offerBookAllYml extends offerYml {
    /**
     *
     * @var string 
     */
    protected $author = '';
    /**
     *
     * @var string 
     */
    protected $publisher = '';
    /**
     *
     * @var string 
     */
    protected $series = '';
    /**
     *
     * @var int
     */
    protected $year = '';
    /**
     *
     * @var string 
     */
    protected $isbn = '';
    /**
     *
     * @var string 
     */
    protected $volume = '';
    /**
     *
     * @var string 
     */
    protected $part = '';
    /**
     *
     * @var string 
     */
    protected $language = '';
    /**
     *
     * @var string 
     */
    protected $tableOfContents = '';
        
    /**
     * 
     * @param string $author
     */
    public function setAuthor($author) {
        $this->author = $author;
    }
    /**
     * 
     * @param string $publisher
     */
    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }
    /**
     * 
     * @param string $series
     */
    public function setSeries($series) {
        $this->series = $series;
    }
    /**
     * 
     * @param int $year
     */
    public function setYear($year) {
        $this->year = $year;
    }

    /**
     * 
     * @param string $isbn
     */
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }
    /**
     * 
     * @param string $volume
     */
    public function setVolume($volume) {
        $this->volume = $volume;
    }
    /**
     * 
     * @param string $part
     */
    public function setPart($part) {
        $this->part = $part;
    }
    /**
     * 
     * @param string $lang
     */
    public function setLanguage($lang) {
        $this->language = $lang;
    }
    /**
     * 
     * @param string $table
     */
    public function setTableOfContents($table) {
        $this->tableOfContents = $table;
    }
    public function getOffer() {
        $offer = parent::getOffer();
        $offer['requared']['type'] = $this->type;        
        $offer['requared']['ISBN'] = $this->isbn;
        $offer['optional']['author'] = $this->author;
        $offer['optional']['publisher'] = $this->publisher;
        $offer['optional']['series'] = $this->series;
        $offer['optional']['year'] = $this->year;
        $offer['optional']['volume'] = $this->volume;
        $offer['optional']['part'] = $this->part;
        $offer['optional']['language'] = $this->language;
        $offer['optional']['table_of_contents'] = $this->tableOfContents;
        unset($offer['optional']['rec']);
        return $offer;
    }
}
