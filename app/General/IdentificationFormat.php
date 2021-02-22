<?php

namespace App\General;

interface IdentificationFormat
{

    /**
     * Generate a {Type} identification number.
     *
     * @param int $length
     *
     * @return string
     */
    public static function generate(int $length = 5): string;
}
