<?php

//function autoloadMain($class) {
////    preg_match_all('/[A-Z][^A-Z]*/', $class, $results);
////    $results =  end($results[0]);
//    $pathToClassFile = __DIR__ . '/model/' . $class . '.php';
//    if (file_exists($pathToClassFile)) {
//        require_once $pathToClassFile;
//    }
//}
//
//spl_autoload_register('autoloadMain');

namespace DartVadius\YmlGenerator;

use DartVadius\YmlGenerator\model\functions;
use DartVadius\YmlGenerator\model\ymlHead;
use DartVadius\YmlGenerator\model\offerYml;
use DartVadius\YmlGenerator\model\validateValueYml;
use DartVadius\YmlGenerator\model\offerBookAllYml;
use DartVadius\YmlGenerator\model\offerBookAudioYml;
use DartVadius\YmlGenerator\model\offerBookPaperYml;
use DartVadius\YmlGenerator\model\offerEventYml;
use DartVadius\YmlGenerator\model\offerMediaYml;
use DartVadius\YmlGenerator\model\offerMedicineYml;
use DartVadius\YmlGenerator\model\offerSimpleYml;
use DartVadius\YmlGenerator\model\offerTourYml;
use DartVadius\YmlGenerator\model\offerVendorYml;

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
        $this->addOffers($offers);
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
        $headRequared['name'] = functions::prepareField($headRequared['name']);
        $this->writer->text($headRequared['name']);
        $this->writer->endElement();
        $this->writer->startElement('company');
        $headRequared['company'] = functions::prepareField($headRequared['company']);
        $this->writer->text($headRequared['company']);
        $this->writer->endElement();
        $this->writer->startElement('url');
        $this->writer->text($headRequared['url']);
        $this->writer->endElement();
        if (!empty($headOptional['platform'])) {
            $this->writer->startElement('platform');
            $headOptional['platform'] = functions::prepareField($headOptional['platform']);
            $this->writer->text($headOptional['platform']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['version'])) {
            $this->writer->startElement('version');
            $headOptional['version'] = functions::prepareField($headOptional['version']);
            $this->writer->text($headOptional['version']);
            $this->writer->endElement();
        }
        if (!empty($headOptional['agency'])) {
            $this->writer->startElement('agency');
            $headOptional['agency'] = functions::prepareField($headOptional['agency']);
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
            $newKey = functions::prepareField($key);
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

    /**
     * 
     * @param array $offers
     */
    private function addOffers($offers) {
        $text = NULL;
        foreach ($offers as $offer) {
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
                if (!is_array($value) && $value !== '') {
                    $this->writer->startElement($tag);
                    $text = functions::prepareField($value);
                    $this->writer->text($text);
                    $this->writer->endElement();
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

}
//
//$h = new ymlHead();
////$h->setCategory('cat1', '1');
////$h->setCategory('cat1.1', '2', '1');
////$h->setCategory([
////    ['cat2', '3'],
////    ['cat2.1', '4', 3],
////]);
////$h->setDeliveryOptions([
////    [55, 7],
////    [66, '7-8', '12'],
////]);
////$h->setAdult('true');
//
//$head = $h->getHead();
//print_r($head);
//$simple = new offerSimpleYml();
////$simpleVal = [
////    'id' => '56544',
////    'bid' => 80,
////    'cbid' => 90,
////    'fee' => '2200',
////    'name' => 'simple offer',
////    'url' => 'asdfasdf',
////    'price' => 55.75,
////    'currencyId' => 'UAH',
////    'categoryId' => '5',
////];
////$simple->setAllValues($simpleVal);
////$simple->setPicture([
////    'asdsaasadsad',
////]);
//$medicine = new offerMedicineYml();
////$medicineVal = [
////    'id' => '7777',
////    'bid' => 55,
////    'fee' => '4400',
////    'name' => 'medicine offer',
////    'url' => 'ewerpdpdp',
////    'price' => 66.75,
////    'currencyId' => 'UAH',
////    'categoryId' => '5',
////];
////$medicine->setAllValues($medicineVal);
////$medicine->setPicture([
////    'asdsadsad',
////    'fdhdfd',
////]);
//$media = new offerMediaYml();
////$mediaVal = [
////    'id' => '77877',
////    'bid' => 58,
////    'fee' => '4405',
////    'name' => 'media offer',
////    'url' => 'qqqqqq',
////    'price' => 87.75,
////    'currencyId' => 'RUR',
////    'categoryId' => '7',
////];
////$media->setDelivery('true');
////$media->setDeliveryOptions([
////    ['55', '7-8', 14],
////    ['99', '8']
////]);
////$media->setAllValues($mediaVal);
////$media->setPicture([
////    'asdsadsads',
////    'fdhdfdasdf',
////    'asasfasklfje',
////]);
//$vendor = new offerVendorYml();
////$vendorVal = [
////    'model' => 'model',
////    'vendor' => 'vendor',
////];
////$vendor->setAllValues($vendorVal);
//$vendor->setOutlets([
//    ['4646', 8, 'false'],
//    ['565', '', 'false'],
//]);
//$vendor->setBarcode([
//    56565656,
//    787857454
//]);
//$vend = $vendor->getOffer();
//$sim = $simple->getOffer();
//$med = $medicine->getOffer();
//$medi = $media->getOffer();
//$offers = [$sim, $med, $medi, $vend];
//$c = new ymlGenerator();
////print_r($c);
//$c->generate($head, $offers);
////print_r($vendor);