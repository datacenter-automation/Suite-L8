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
    protected static string $accountTypeDefault = 'C';

    /**
     * @param string $type
     * @param int    $length
     */
    public function __construct(public string $type = '', public int $length = 5)
    {
        //
    }

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

        $chars = range(0, 9);

        $accountId = in_array($type, static::$accountTypes) ? $type : static::$accountTypeDefault;

        for ($count = 0; $count < $length; $count ++) {
            $accountId .= $chars[rand(0, count($chars) - 1)];
        }

        return $accountId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return static::generate($this->type, $this->length);
    }
}
