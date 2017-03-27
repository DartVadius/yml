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
    protected $binding = '';
    /**
     *
     * @var string 
     */
    protected $pageExtent = '';

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
    
    /**
     * 
     */
    public function getOffer() {
        $offer = parent::getOffer();
        $offer['optional']['binding'] = $this->binding;
        $offer['optional']['page_extent'] = $this->pageExtent;
        return $offer;
    }
}
