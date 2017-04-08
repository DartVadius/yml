<?php
namespace DartVadius\YmlGenerator\offer;

use DartVadius\YmlGenerator\offer\AbstractYmlOffer;

/**
 * offerBookAllYml
 *
 * @author DartVadius
 */
abstract class AbstractBookYmlOffer extends AbstractYmlOffer {
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
    protected $ISBN = '';
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
        return $this;
    }
    /**
     * 
     * @param string $publisher
     */
    public function setPublisher($publisher) {
        $this->publisher = $publisher;
        return $this;
    }
    /**
     * 
     * @param string $series
     */
    public function setSeries($series) {
        $this->series = $series;
        return $this;
    }
    /**
     * 
     * @param int $year
     */
    public function setYear($year) {
        $this->year = $year;
        return $this;
    }

    /**
     * 
     * @param string $isbn
     */
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
        return $this;
    }
    /**
     * 
     * @param string $volume
     */
    public function setVolume($volume) {
        $this->volume = $volume;
        return $this;
    }
    /**
     * 
     * @param string $part
     */
    public function setPart($part) {
        $this->part = $part;
        return $this;
    }
    /**
     * 
     * @param string $lang
     */
    public function setLanguage($lang) {
        $this->language = $lang;
        return $this;
    }
    /**
     * 
     * @param string $table
     */
    public function setTableOfContents($table) {
        $this->tableOfContents = $table;
        return $this;
    }
    public function getOffer() {
        $offer = parent::getOffer();        
        $offer['requared']['ISBN'] = $this->ISBN;
        $offer['optional']['author'] = $this->author;
        $offer['optional']['publisher'] = $this->publisher;
        $offer['optional']['series'] = $this->series;
        $offer['optional']['year'] = $this->year;
        $offer['optional']['volume'] = $this->volume;
        $offer['optional']['part'] = $this->part;
        $offer['optional']['language'] = $this->language;
        $offer['optional']['table_of_contents'] = $this->tableOfContents;
        unset($offer['optional']['model']);
        unset($offer['optional']['vendor']);
        unset($offer['optional']['vendorCode']);
        unset($offer['optional']['rec']);
        return $offer;
    }
}
