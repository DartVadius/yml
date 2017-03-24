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
    private $performedBy = NULL;
    /**
     *
     * @var string 
     */
    private $performanceType = NULL;
    
    /**
     *
     * @var string 
     */
    private $storage = NULL;
    
    /**
     *
     * @var string
     */
    private $format = NULL;
    /**
     *
     * @var string 
     */
    private $recordingLength = NULL;
    
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
}
