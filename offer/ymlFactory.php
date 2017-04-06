<?php

function autoloadOffer($class) {
    $pathToClassFile = __DIR__ . '/offer/' . $class . '.php';
    if (file_exists($pathToClassFile)) {
        require_once $pathToClassFile;
    }
    require_once 'offer/abstractYmlOffer.php';
    require_once 'offer/bookAllYmlOffer.php';
    require_once 'offer/functionsYmlOffer.php';    
}

spl_autoload_register('autoloadOffer');

/**
 * ymlFactory
 *
 * @author DartVadius
 */
class yml_ymlFactory {
    public function getYml($name) {
        $class = $name . 'YmlOffer';
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("Wrong class");
        }
    }
}