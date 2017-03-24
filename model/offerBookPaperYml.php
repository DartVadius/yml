<?php

/**
 * offerBookPaperYml
 *
 * @author DartVadius
 */
class offerBookPaperYml extends offerBookAllYml {
    /**
     *
     * @var string 
     */
    protected $binding = NULL;
    /**
     *
     * @var string 
     */
    protected $pageExtent = NULL;

    public function __construct() {
        $this->type = 'book';
    }
    
    /**
     * 
     * @param string $bind
     */
    public function setBinding($bind) {
        $this->binding = $bind;
    }
    /**
     * 
     * @param string $page
     */
    public function setPageExtent($page) {
        $this->pageExtent = $page;
    }
}
