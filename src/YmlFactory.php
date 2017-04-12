<?php

namespace DartVadius\YmlGenerator;

/**
 * YmlFactory
 *
 * @author DartVadius
 */
class YmlFactory {

    public static function getYml($name) {
        $pathToClassFile = __DIR__ . '/offer/' . ucfirst($name) . 'YmlOffer.php';
        if (file_exists($pathToClassFile)) {
            require_once $pathToClassFile;
        }
        if (class_exists(ucfirst($name) . 'YmlOffer')) {
            return new ucfirst($name) . 'YmlOffer';
        }
        return FALSE;        
    }

}