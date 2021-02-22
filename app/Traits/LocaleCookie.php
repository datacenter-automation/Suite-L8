<?php

namespace App\Traits;

use Cookie;

trait LocaleCookie
{
    /**
     * @var int
     */
    public static int $cacheDurationInMinutes = 20160;

    /**
     * Set Language Cookie.
     *
     * @param string $lang
     */
    public static function setLanguageCookie(string $lang)
    {
        Cookie::queue(Cookie::make('lang', $lang, static::$cacheDurationInMinutes));
    }
}
