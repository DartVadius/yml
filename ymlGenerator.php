<?php

function autoloadMain($class) {
//    preg_match_all('/[A-Z][^A-Z]*/', $class, $results);
//    $results =  end($results[0]);
    $pathToClassFile = __DIR__ . '/model/' . $class . '.php';
    if (file_exists($pathToClassFile)) {
        require_once $pathToClassFile;
    }
}

spl_autoload_register('autoloadMain');

/**
 * ymlGenerator
 *
 * @author DartVadius
 */
class ymlGenerator {

    private $writer;

    public function __construct() {
        $this->writer = new XMLWriter();
    }

    public function generate($head, $offers) {
//        foreach ($head['requared'] as $key => $value) {
//            if (empty($value)) {
//                throw new Exception('Header: Required fields are empty');
//            }
//        }
        $this->writer->openMemory();
        $this->addHeader($head);
        $this->addFooter();
        echo $this->writer->outputMemory();
    }

    /**
     * generate header for xml
     * 
     * @param array $head
     */
    private function addHeader($head) {
        $headRequared = $head['requared'];
        $headOptional = $head['optional'];
        $this->writer->startDocument('1.0', $headRequared['encode']);
        $this->writer->startElement('yml_catalog');
        $this->writer->writeAttribute('date', date('Y-m-d H:i'));
        $this->writer->startElement('shop');
        $this->writer->startElement('name');
        $this->writer->text($headRequared['name']);
        $this->writer->endElement();
        $this->writer->startElement('company');
        $this->writer->text($headRequared['company']);
        $this->writer->endElement();
        $this->writer->startElement('url');
        $this->writer->text($headRequared['url']);
        $this->writer->endElement();
        if (!empty($headOptional['platform'])) {
            $this->writer->startElement('platform');
            $this->writer->text($headOptional['platform']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['version'])) {
            $this->writer->startElement('version');
            $this->writer->text($headOptional['version']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['agency'])) {
            $this->writer->startElement('agency');
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
            $this->writer->text($key);
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
        if (!empty($headOptional['cpa'])) {
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
    }
    
    private function addOffers($offers) {
        foreach ($offers as $offer) {
            
        }
    }

}

$h = new ymlHead();
$h->setCategory('cat1', '1');
$h->setCategory('cat1.1', '2', '1');
$h->setCategory([
    ['cat2', '3'],
    ['cat2.1', '4', 3],
]);
$h->setDeliveryOptions([
    [55, 7],
    [66, '7-8', '12'],
]);

//$h->setAdult('true');

$head = $h->getHead();
print_r($head);
$o = new offerEventYml();
$offer = $o->getOffer();
$c = new ymlGenerator();
//print_r($c);
$c->generate($head, $offer);
