<?php
namespace DartVadius\YmlGenerator\model;
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
    }
}
