<?php
require_once 'offerYml.php';

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
    protected $author = NULL;
    /**
     *
     * @var string 
     */
    protected $publisher = NULL;
    /**
     *
     * @var string 
     */
    protected $series = NULL;
    /**
     *
     * @var string 
     */
    protected $isbn = NULL;
    /**
     *
     * @var string 
     */
    protected $volume = NULL;
    /**
     *
     * @var string 
     */
    protected $part = NULL;
    /**
     *
     * @var string 
     */
    protected $language = NULL;
    /**
     *
     * @var string 
     */
    protected $tableOfContents = NULL;
        
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
}
