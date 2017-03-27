<?php

function autoloadMain($class) {
//    preg_match_all('/[A-Z][^A-Z]*/', $class, $results);
//    $results =  end($results[0]);
    $pathToClassFile = __DIR__ . '/model/' . $class.'.php';
    if (file_exists($pathToClassFile)) {
        require_once $pathToClassFile;
    }
}
spl_autoload_register('autoloadMain');

/**
 * ymlController
 *
 * @author DartVadius
 */
class yml {    
    public function setClass() {
        return new offerEventYml();
    }
}

$c = new yml();
$a = $c->setClass();
print_r($a->getOffer());