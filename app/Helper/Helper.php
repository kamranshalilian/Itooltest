<?php

namespace App\Helper;

class Helper
{
    public static function toEnglishNumbers(string $string): string
    {
        $persinaDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $persinaDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $allPersianDigits = array_merge($persinaDigits1, $persinaDigits2);
        $replaces = [...range(0, 9), ...range(0, 9)];

        return str_replace($allPersianDigits, $replaces, $string);
    }

    public static function checkCartDigit($cartNumber)
    {
        $len = strlen($cartNumber);
        if ($len < 16 || intval(substr($cartNumber, 1, 10), 10) == 0 || intval(substr($cartNumber, 10, 6), 10) == 0) return false;
        $s = 0;
        for ($i = 0; $i < 16; $i++) {
            $k = ($i % 2 == 0) ? 2 : 1;
            $d = intval(substr($cartNumber, $i, 1), 10) * $k;
            $s += ($d > 9) ? $d - 9 : $d;
        }
        return (($s % 10) == 0);
    }
}
