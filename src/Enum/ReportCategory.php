<?php


namespace App\Enum;


abstract class ReportCategory
{

    private static $categories = [
        'Apologie de comportements illégaux',
        'Contenu à caractère sexuel',
        'Discrimination',
        'Propos haineux',
        'Utilisation de données personnelles',
        'Autre'
    ];

    public static function getCategories() {
        return self::$categories;
    }
}