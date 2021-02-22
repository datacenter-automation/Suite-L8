<?php

namespace App\General;

use OutOfBoundsException;

/**
 * Class AccountId.
 */
class AccountId implements IdentificationTypeFormat
{

    protected const LOWER_BOUNDS = 4;

    /**
     * Account Types.
     *
     * @var array
     */
    protected static $accountTypes = [
        'C',
        'V',
        'WG',
    ];

    /**
     * Account Type Default.
     *
     * @var string
     */
    protected static $accountTypeDefault = 'C';

    /**
     * Generate an account number.
     *
     * @param string $type
     * @param int    $length
     *
     * @return string
     */
    public static function generate(string $type = '', int $length = 5): string
    {
        if ($length <= self::LOWER_BOUNDS) {
            return new OutOfBoundsException('Account ID length must be greater than ' . self::LOWER_BOUNDS . '.');
        }

        $chars = array_merge(range(0, 9));

        $accountId = in_array($type, static::$accountTypes) ? $type : static::$accountTypeDefault;

        for ($count = 0; $count < $length; $count ++) {
            $accountId .= strtoupper($chars[rand(0, count($chars) - 1)]);
        }

        return $accountId;
    }
}
