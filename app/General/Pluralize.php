<?php

namespace App\General;

/**
 * Class Pluralize.
 */
class Pluralize
{

    /**
     * @var array
     */
    private static $plural = [
        ['/(quiz)$/i', '$1zes'],
        ['/^(ox)$/i', '$1en'],
        ['/([m|l])ouse$/i', '$1ice'],
        ['/(matr|vert|ind)ix|ex$/i', '$1ices'],
        ['/(x|ch|ss|sh)$/i', '$1es'],
        ['/([^aeiouy]|qu)y$/i', '$1ies'],
        ['/([^aeiouy]|qu)ies$/i', '$1y'],
        ['/(hive)$/i', '$1s'],
        ['/(?:([^f])fe|([lr])f)$/i', '$1$2ves'],
        ['/sis$/i', 'ses'],
        ['/([ti])um$/i', '$1a'],
        ['/(buffal|tomat)o$/i', '$1oes'],
        ['/(bu)s$/i', '$1ses'],
        ['/(alias|status)$/i', '$1es'],
        ['/(octop|vir)us$/i', '$1i'],
        ['/(ax|test)is$/i', '$1es'],
        ['/s$/i', 's'],
        ['/$/', 's'],
    ];

    /**
     * @var array
     */
    private static $irregular = [
        ['move', 'moves'],
        ['sex', 'sexes'],
        ['child', 'children'],
        ['man', 'men'],
        ['woman', 'women'],
        ['person', 'people'],
        ['datum', 'data'],
    ];

    /**
     * @var array
     */
    private static $uncountable = [
        'sheep',
        'fish',
        'series',
        'species',
        'money',
        'rice',
        'information',
        'equipment',
    ];

    /**
     * Given a singular word and a count, returns the pural version of the word if appropriate.
     *
     * @param     $string
     * @param int $count
     *
     * @return string|string[]|null
     */
    public static function make($string, $count = 2)
    {
        if ($count == 1) {
            return $string;
        }

        if (in_array(strtolower($string), self::$uncountable)) {
            return $string;
        }

        foreach (self::$irregular as $noun) {
            if (strtolower($string) == $noun[0]) {
                return $noun[1];
            }
        }

        foreach (self::$plural as $pattern) {
            if (preg_match($pattern[0], $string)) {
                return preg_replace($pattern[0], $pattern[1], $string);
            }
        }

        return $string;
    }
}
