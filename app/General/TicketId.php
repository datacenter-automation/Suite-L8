<?php

namespace App\General;

use OutOfBoundsException;

/**
 * Class TicketId.
 */
class TicketId implements IdentificationFormat
{

    protected const LOWER_BOUNDS = 3;

    /**
     * @param int $length
     */
    public function __construct(public int $length = 10)
    {
        //
    }

    /**
     * Generate a ticket identification number.
     *
     * @param int $length
     *
     * @return string
     */
    public static function generate(int $length = 10): string
    {
        if ($length <= self::LOWER_BOUNDS) {
            return new OutOfBoundsException('Ticket ID length must be greater than ' . self::LOWER_BOUNDS . '.');
        }

        $chars = array_merge(range('A', 'Z'), range(0, 9));

        $ticketId = '';

        for ($count = 0; $count < $length; $count ++) {
            $ticketId .= $chars[rand(0, count($chars) - 1)];
        }

        return $ticketId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return static::generate($this->length);
    }
}
