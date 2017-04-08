<?php

namespace DartVadius\YmlGenerator;

use DartVadius\YmlGenerator\offer\ValidateValueYmlOffer;

/**
 * ValidatorYmlOffer
 *
 * @author DartVadius
 */
class ValidatorYmlOffer {

    public static function headValidate($head) {
        foreach ($head['requared'] as $req) {
            if ($req === '' || !isset($req)) {
                return FALSE;
            }
        }
        if (ValidateValueYmlOffer::nameValidate($head['requared']['name']) &&
                ValidateValueYmlOffer::categoryValidate($head['requared']['categories'])) {
            foreach ($head['requared']['currencies'] as $id => $value) {
                if (!ValidateValueYmlOffer::currencyValidate($id, $value)) {
                    return FALSE;
                }
            }
            return TRUE;
        }
        return FALSE;
    }

    public static function offerValidate($offer) {
        foreach ($offer['requared'] as $req) {
            if ($req === '' || !isset($req)) {
                return FALSE;
            }
        }
        return TRUE;
    }

}
