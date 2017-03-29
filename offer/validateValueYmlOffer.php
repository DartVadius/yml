<?php
//namespace DartVadius\YmlGenerator;
/**
 * validateValueYml
 *
 * @author DartVadius
 */
class validateValueYmlOffer {
    /**
     * validate id in offer
     *
     * @param string $id
     * @return boolean
     */
    public static function idValidate($id) {
        if (ctype_alnum($id) && strlen($id) < 21) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * validate bid, cbid, fee, price, etc in offer
     *
     * @param string || int $value
     * @return boolean
     */
    public static function numericIntValidate($value) {
        if (is_numeric($value) && stripos($value, '.') === FALSE && stripos($value, '-') === FALSE) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * validate price and oldprice in offer
     *
     * @param float $price
     * @return boolean
     */
    public static function priceOldpriceValidate($price) {
        if (is_numeric($price)) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * validate currency Id in offer
     *
     * @param string $currencyId
     * @return boolean
     */
    public static function currencyIdValidate($currencyId) {
        $idArr = ['RUR', 'RUB', 'UAH', 'BYN', 'KZT', 'USD', 'EUR'];
        if (in_array($currencyId, $idArr)) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * validate category id in offer
     *
     * @param string || int $id
     * @return boolean
     */
    public static function categoryIdValidate($id) {
        if (strlen($id) > 18 || !is_numeric($id) || stripos($id, '.') !== FALSE || $id == 0) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * validate pictures in offer
     *
     * @param array $picture
     * @return boolean
     */
    public static function pictureValidate($picture) {
        if (count($picture) > 10) {
            return FALSE;
        }
        foreach ($picture as $pic) {
            if (exif_imagetype($pic) != 2 || exif_imagetype($pic) != 3) {
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     *
     * @param string $name
     * @return boolean
     */
    public static function nameValidate($name) {
        if (strlen($name) > 20) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * validate currency in Head
     *
     * @param string $id
     * @param string $value
     * @return boolean
     */
    public static function currencyValidate($id, $value) {
        $idArr = ['RUR', 'RUB', 'UAH', 'BYN', 'KZT', 'USD', 'EUR'];
        $valueArr = ['CBRF', 'NBU', 'CB', 'NBK'];
        if ((is_numeric($value) || in_array($value, $valueArr)) && in_array($id, $idArr)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * validate email in Head
     *
     * @param string $email
     * @return boolean
     */
    public static function emailValidate($email) {
        $s = '"';
        if (preg_match("/^(\w+([\.\w+])*)@\w+(\.\w+)?\.\w{2,3}$/i", $email) || preg_match("/^$s{1}.+$s{1}@\w+(\.\w+)?\.\w{2,3}$/i", $email)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * validate type of variables and connections to parent categories in Head
     *
     * @param array $categories
     * @return boolean
     */
    public static function categoryValidate($categories) {
        $id = [];
        foreach ($categories as $category) {
            if (!empty($category['id']) &&
                    is_numeric($category['id']) &&
                    strlen($category['id']) < 19 &&
                    stripos($category['id'], '.') === FALSE) {
                array_push($id, $category['id']);
            } else {
                return FALSE;
            }
        }
        foreach ($categories as $category) {
            if (!empty($category['parentId']) && (!in_array($category['parentId'], $id) ||
                    !is_numeric($category['parentId']) ||
                    stripos($category['parentId'], '.') !== FALSE)) {
                return FALSE;
            }
        }
        if (count($id) !== count(array_unique($id))) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * validate delivery options in Head and offer
     *
     * @param array $delivery
     * @return boolean
     */
    public static function deliveryOptionsValidate($delivery) {
        if (count($delivery) > 5) {
            return FALSE;
        }
        foreach ($delivery as $option) {
            if (!is_numeric($option['cost']) || stripos($option['cost'], '.') !== FALSE) {
                return FALSE;
            }
            if (!isset($option['days'])) {
                return FALSE;
            }
        }
        return TRUE;
    }
}
