<?php

namespace App\General;

/**
 * Class TransactionId.
 */
class TransactionId implements IdentificationFormat
{

    /**
     * Generate a transaction identification number.
     *
     * @param int $length
     *
     * @return string
     */
    public static function generate(int $length = 5): string
    {
        $chars = array_merge(range(0, 9), range('a', 'f'));

        $transactionId = 'TX';

        $length = 64;

        for ($count = 0; $count < $length; $count ++) {
            $transactionId .= strtoupper($chars[rand(0, count($chars) - 1)]);
        }

        return $transactionId;
    }
}
