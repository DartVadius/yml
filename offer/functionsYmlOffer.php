<?php
//namespace DartVadius\YmlGenerator;
/**
 * functions
 *
 * @author DartVadius
 */
class functionsYmlOffer {

    public static function prepareField($s) {
        $from = array('"', '&', '>', '<', '\'');
        $to = array('&quot;', '&amp;', '&gt;', '&lt;', '&apos;');
        $s = str_replace($from, $to, $s);        
        $s = preg_replace('#[\x00-\x08\x0B-\x0C\x0E-\x1F]+#is', ' ', $s);
        return trim($s);
    }

}
