<?php

/**
 * functions
 *
 * @author DartVadius
 */
class functions {

    public static function prepare_field($s) {
        $from = array('"', '&', '>', '<', '\'');
        $to = array('&quot;', '&amp;', '&gt;', '&lt;', '&apos;');
        $s = str_replace($from, $to, $s);        
        $s = preg_replace('#[\x00-\x08\x0B-\x0C\x0E-\x1F]+#is', ' ', $s);
        return trim($s);
    }

}
