<?php
namespace DartVadius\YmlGenerator\offer;
//
use DartVadius\YmlGenerator\offer\AbstractBookYmlOffer;

/**
 * offerBookAudioYml
 *
 * @author DartVadius
 */
class BookAudioYmlOffer extends AbstractBookYmlOffer {
    /**
     *
     * @var string 
     */
    private $performedBy = '';
    /**
     *
     * @var string 
     */
    private $performanceType = '';
    
    /**
     *
     * @var string 
     */
    private $storage = '';
    
    /**
     *
     * @var string
     */
    private $format = '';
    /**
     *
     * @var string 
     */
    private $recordingLength = '';
    
    public function __construct() {
        $this->type = 'audiobook';
    }
    
    /**
     * 
     * @param string $perf
     */
    public function setPerformedBy($perf) {
        $this->performedBy = $perf;
        return $this;
    }
    
    /**
     * 
     * @param string $perfType
     */
    public function setPerformanceType($perfType) {
        $this->performanceType = $perfType;
        return $this;
    }
    
    /**
     * 
     * @param string $storage
     */
    public function setStorage($storage) {
        $this->storage = $storage;
        return $this;
    }
    
    /**
     * 
     * @param string $format
     */
    public function setFormat($format) {
        $this->format =$format;
        return $this;
    }
    
    /**
     * 
     * @param string $length
     */
    public function setRecordingLength($length) {
        $this->recordingLength = $length;
        return $this;
    }
    
    /**
     * 
     * @return array
     */
    public function getOffer() {
        $offer = parent::getOffer();        
        $offer['optional']['performed_by'] = $this->performedBy;
        $offer['optional']['performance_type'] = $this->performanceType;
        $offer['optional']['storage'] = $this->storage;
        $offer['optional']['format'] = $this->format;
        $offer['optional']['recording_length'] = $this->recordingLength;        
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
        return $this;
    }
}