<?php

namespace App\General;

interface IdentificationTypeFormat
{

    /**
     * @param string $type
     * @param int    $length
     *
     * @return string
     */
    public static function generate(string $type = '', int $length = 5): string;
}
