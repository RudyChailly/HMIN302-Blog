<?php


namespace App\Enum;


abstract class ReportCategory
{

    private static $categories = [
        'Racism',
        'Sexual'
    ];

    public static function getCategories() {
        return self::$categories;
    }
}