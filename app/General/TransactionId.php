<?php

namespace App\General;

/**
 * Class TransactionId.
 */
class TransactionId implements IdentificationFormat
{

    /**
     * @param int $length
     */
    public function __construct(public int $length = 5)
    {
        //
    }

    /**
     * Generate a transaction identification number.
     *
     * @param int $length
     *
     * @return string
     */
    public static function generate(int $length = 5): string
    {
        $chars = array_merge(range('A', 'F'), range(0, 9));

        $transactionId = 'TX';

        for ($count = 0; $count < $length; $count ++) {
            $transactionId .= $chars[rand(0, count($chars) - 1)];
        }

        return $transactionId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return static::generate($this->length);
    }
}
