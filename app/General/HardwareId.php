<?php

namespace App\General;

use OutOfBoundsException;

/**
 * Class HardwareId.
 */
class HardwareId implements IdentificationFormat
{

    protected const LOWER_BOUNDS = 4;

    /**
     * @param int $length
     */
    public function __construct(public int $length = 7)
    {
        //
    }

    /**
     * Generate a hardware identification number.
     *
     * @param int $length
     *
     * @return string
     */
    public static function generate(int $length = 7): string
    {
        if ($length <= self::LOWER_BOUNDS) {
            return new OutOfBoundsException('Hardware ID length must be greater than ' . self::LOWER_BOUNDS . '.');
        }

        $chars = range(0, 9);

        $hardwareId = 'HW';

        for ($count = 0; $count < $length; $count ++) {
            $hardwareId .= $chars[rand(0, count($chars) - 1)];
        }

        return $hardwareId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return static::generate($this->length);
    }
}
