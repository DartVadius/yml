<?php

/**
 * offerBookAudioYml
 *
 * @author DartVadius
 */
class offerBookAudioYml extends offerBookAllYml {
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
    }
    
    /**
     * 
     * @param string $perfType
     */
    public function setPerformanceType($perfType) {
        $this->performanceType = $perfType;
    }
    
    /**
     * 
     * @param string $storage
     */
    public function setStorage($storage) {
        $this->storage = $storage;
    }
    
    /**
     * 
     * @param string $format
     */
    public function setFormat($format) {
        $this->format =$format;
    }
    
    /**
     * 
     * @param string $length
     */
    public function setRecordingLength($length) {
        $this->recordingLength = $length;
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
}
$c = new offerBookAudioYml();
print_r($c->getOffer());