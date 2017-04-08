<?php
namespace DartVadius\YmlGenerator;

use DartVadius\YmlGenerator\offer\FunctionsYmlOffer;

/**
 * ymlGenerator
 *
 * @author DartVadius
 */
class GeneratorYmlOffer {

    private $writer;

    public function __construct() {
        $this->writer = new XMLWriter();
    }

    /**
     * create full xml document
     * 
     * @param array $head 
     * @param array $offers
     * @return string
     */
    public function generate($head, $offers) {
        $this->addHeader($head);
        $this->addOffers($offers);
        return $this->addFooter();
    }

    /**
     * add header to xml
     * 
     * @param array $head
     */
    public function generateHead($head) {
        $this->addHeader($head);
    }
    
    /**
     * add single offer to xml
     * 
     * @param array $offer
     */
    public function generateOffer($offer) {
        $this->addOffer($offer);
    }
    
    /**
     * add footer to xml
     * 
     * @return string
     */
    public function generateFooter() {
        return $this->addFooter();
    }

    /**
     * generate header for xml
     * 
     * @param array $head
     */
    private function addHeader($head) {
        $this->writer->openMemory();
        $headRequared = $head['requared'];
        $headOptional = $head['optional'];
        $this->writer->startDocument('1.0', $headRequared['encode']);
        $this->writer->startElement('yml_catalog');
        $this->writer->writeAttribute('date', date('Y-m-d H:i'));
        $this->writer->startElement('shop');
        $this->writer->startElement('name');
        $headRequared['name'] = FunctionsYmlOffer::prepareField($headRequared['name']);
        $this->writer->text($headRequared['name']);
        $this->writer->endElement();
        $this->writer->startElement('company');
        $headRequared['company'] = FunctionsYmlOffer::prepareField($headRequared['company']);
        $this->writer->text($headRequared['company']);
        $this->writer->endElement();
        $this->writer->startElement('url');
        $this->writer->text($headRequared['url']);
        $this->writer->endElement();
        if (!empty($headOptional['platform'])) {
            $this->writer->startElement('platform');
            $headOptional['platform'] = FunctionsYmlOffer::prepareField($headOptional['platform']);
            $this->writer->text($headOptional['platform']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['version'])) {
            $this->writer->startElement('version');
            $headOptional['version'] = FunctionsYmlOffer::prepareField($headOptional['version']);
            $this->writer->text($headOptional['version']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['agency'])) {
            $this->writer->startElement('agency');
            $headOptional['agency'] = FunctionsYmlOffer::prepareField($headOptional['agency']);
            $this->writer->text($headOptional['agency']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['email'])) {
            $this->writer->startElement('email');
            $this->writer->text($headOptional['email']);
            $this->writer->endElement();
        }

// set currencies
        $this->writer->startElement('currencies');
        foreach ($headRequared['currencies'] as $key => $value) {
            $this->writer->startElement('currency');
            $this->writer->writeAttribute('id', $key);
            $this->writer->writeAttribute('rate', $value);
            $this->writer->endElement();
        }
        $this->writer->fullEndElement();

// set categories
        $this->writer->startElement('categories');
        foreach ($headRequared['categories'] as $key => $value) {
            $this->writer->startElement('category');
            $this->writer->writeAttribute('id', $value['id']);
            if (!empty($value['parentId'])) {
                $this->writer->writeAttribute('parentId', $value['parentId']);
            }
            $newKey = FunctionsYmlOffer::prepareField($key);
            $this->writer->text($newKey);
            $this->writer->endElement();
        }
        $this->writer->fullEndElement();

// set delivery options
        if (!empty($headOptional['delivery-options'])) {
            $this->writer->startElement('delivery-options');
            foreach ($headOptional['delivery-options'] as $value) {
                $this->writer->startElement('option');
                $this->writer->writeAttribute('cost', $value['cost']);
                $this->writer->writeAttribute('days', $value['days']);
                if (isset($value['before'])) {
                    $this->writer->writeAttribute('order-before', $value['before']);
                }
                $this->writer->endElement();
            }
            $this->writer->fullEndElement();
        }

//set cpa        
        if (isset($headOptional['cpa'])) {
            $this->writer->startElement('cpa');
            $this->writer->text($headOptional['cpa']);
            $this->writer->endElement();
        }

// set adult
        if (!empty($headOptional['adult'])) {
            $this->writer->startElement('adult');
            $this->writer->text($headOptional['adult']);
            $this->writer->endElement();
        }

        $this->writer->startElement('offers');
    }

    /**
     * generate footer for xml
     */
    private function addFooter() {
        $this->writer->fullEndElement();
        $this->writer->fullEndElement();
        $this->writer->fullEndElement();
        $this->writer->endDocument();
        return $this->writer->outputMemory();
    }

    /**
     * generate offers for xml
     * 
     * @param array $offers
     */
    private function addOffers($offers) {
        foreach ($offers as $offer) {
            $this->addOffer($offer);
        }
    }

    /**
     * generate one offer for xml
     * 
     * @param array $offer
     */
    private function addOffer($offer) {
        $this->writer->startElement('offer');
        $this->writer->writeAttribute('id', $offer['requared']['id']);
        unset($offer['requared']['id']);
        if (isset($offer['requared']['type'])) {
            $this->writer->writeAttribute('type', $offer['requared']['type']);
            unset($offer['requared']['type']);
        }
        if (!empty($offer['optional']['bid'])) {
            $this->writer->writeAttribute('bid', $offer['optional']['bid']);
            unset($offer['optional']['bid']);
        }
        if (!empty($offer['optional']['cbid'])) {
            $this->writer->writeAttribute('cbid', $offer['optional']['cbid']);
            unset($offer['optional']['cbid']);
        }
        if (!empty($offer['optional']['fee'])) {
            $this->writer->writeAttribute('fee', $offer['optional']['fee']);
            unset($offer['optional']['fee']);
        }
        if (!empty($offer['optional']['available'])) {
            $this->writer->writeAttribute('available', $offer['optional']['available']);
            unset($offer['optional']['available']);
        }

        foreach ($offer['requared'] as $tag => $value) {
            if ($tag != 'picture') {
                $this->writer->startElement($tag);
                $this->writer->text($value);
                $this->writer->endElement();
            } else {
                foreach ($value as $url) {
                    $this->writer->startElement('picture');
                    $this->writer->text($url);
                    $this->writer->endElement();
                }
            }
        }
        foreach ($offer['optional'] as $tag => $value) {
            if (!is_array($value) && $value != '') {
                $this->writer->startElement($tag);
                $text = FunctionsYmlOffer::prepareField($value);
                $this->writer->text($text);
                $this->writer->fullEndElement();
                if ($tag == 'delivery' && $value != 'false') {
                    $this->writer->startElement('delivery-options');
                    foreach ($offer['optional']['delivery-options'] as $option) {
                        $this->writer->startElement('option');
                        $this->writer->writeAttribute('cost', $option['cost']);
                        $this->writer->writeAttribute('days', $option['days']);
                        if (!empty($option['before'])) {
                            $this->writer->writeAttribute('before', $option['before']);
                        }
                        $this->writer->endElement();
                    }
                    $this->writer->fullEndElement();
                    unset($offer['optional']['delivery-options']);
                }
            }
        }



        if (!empty($offer['optional']['outlets'])) {
            $this->writer->startElement('outlets');
            foreach ($offer['optional']['outlets'] as $outlet) {
                $this->writer->startElement('outlet');
                $this->writer->writeAttribute('id', $outlet['id']);
                if (!empty($outlet['instock'])) {
                    $this->writer->writeAttribute('instock', $outlet['instock']);
                }
                if (!empty($outlet['booking'])) {
                    $this->writer->writeAttribute('booking', $outlet['booking']);
                }
                $this->writer->endElement();
            }
            $this->writer->fullEndElement();
        }

        if (!empty($offer['optional']['barcode'])) {
            foreach ($offer['optional']['barcode'] as $code) {
                $this->writer->startElement('barcode');
                $this->writer->text($code);
                $this->writer->endElement();
            }
        }

        if (!empty($offer['optional']['param'])) {
            foreach ($offer['optional']['param'] as $param) {
                $this->writer->startElement('param');
                $this->writer->writeAttribute('name', $param['name']);
                if (!empty($param['unit'])) {
                    $this->writer->writeAttribute('unit', $param['unit']);
                }
                $this->writer->text($param['title']);
                $this->writer->endElement();
            }
        }

        $this->writer->fullEndElement();
    }

}