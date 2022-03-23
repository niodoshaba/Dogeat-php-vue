<?php

namespace Bang\Lib;

/**
 * @author Bang
 */
class Char {

    public static $Index36 = array(
        '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4,
        '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
        'a' => 10, 'b' => 11, 'c' => 12, 'd' => 13, 'e' => 14,
        'f' => 15, 'g' => 16, 'h' => 17, 'i' => 18, 'j' => 19,
        'k' => 20, 'l' => 21, 'm' => 22, 'n' => 23, 'o' => 24,
        'p' => 25, 'q' => 26, 'r' => 27, 's' => 28, 't' => 29,
        'u' => 30, 'v' => 31, 'w' => 32, 'x' => 33, 'y' => 34,
        'z' => 35,
    );

    public static function GetCharIndex($char) {
        $lower = strtolower($char);
        $result = Char::$Index36[$lower];
        return $result;
    }

}
