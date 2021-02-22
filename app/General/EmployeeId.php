<?php

namespace App\General;

use OutOfBoundsException;

/**
 * Class EmployeeId.
 */
class EmployeeId implements IdentificationFormat
{

    protected const LOWER_BOUNDS = 4;

    /**
     * @param int $length
     */
    public function __construct(public int $length = 5)
    {
        //
    }

    /**
     * Generate a employee identification number.
     *
     * @param int $length
     *
     * @return string
     */
    public static function generate(int $length = 5): string
    {
        if ($length <= self::LOWER_BOUNDS) {
            return new OutOfBoundsException('Employee ID length must be greater than ' . self::LOWER_BOUNDS . '.');
        }

        $chars = range(0, 9);

        $employeeId = 'EMP';

        for ($count = 0; $count < $length; $count ++) {
            $employeeId .= $chars[rand(0, count($chars) - 1)];
        }

        return $employeeId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return static::generate($this->length);
    }
}
