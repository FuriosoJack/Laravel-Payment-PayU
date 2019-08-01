<?php
namespace FuriosoJack\PayUPaymentLaravel;

/**
 * Class PayUVariables
 * @package FuriosoJack\PayUPaymentLaravel
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayUVariables
{
    public static function getAvailableCreditCards()
    {
        return [
            'NARANJA',
            'SHOPPING',
            'CENCOSUD',
            'ARGENCARD',
            'CABAL',
            'VISA',
            'AMEX',
            'MASTERCARD',
            'DINERS',
            'CODENSA',
            'ELO'
        ];
    }

}