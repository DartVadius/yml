<?php

function autoloadOffer($class) {
    $pathToClassFile = __DIR__ . '/offer/' . $class . '.php';
    if (file_exists($pathToClassFile)) {
        require_once $pathToClassFile;
    }
    require_once 'offer/abstractYmlOffer.php';
    require_once 'offer/bookAllYmlOffer.php';
    require_once 'offer/functionsYmlOffer.php';
    require_once 'offer/validateValueYmlOffer.php';
}

spl_autoload_register('autoloadOffer');

/**
 * ymlFactory
 *
 * @author DartVadius
 */
class ymlFactory {
    public static function getYml($name) {
        $class = $name . 'YmlOffer';
        if (class_exists($name)) {
            return new $name();
        } else {
            throw new Exception("Wrong class");
        }
    }
}