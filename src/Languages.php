<?php

namespace DivineOmega\Languages;

class Language
{
    public static function all()
    {
        $fh = fopen(__DIR__.'/../resources/languages.csv', 'r');

        $languages = [];

        while ($row = fgetcsv($fh)) {
            $language = new self;
            $language->family = $row[0];
            $language->name = $row[1];
            $language->nativeName = $row[2];
            $language->iso639_1 = $row[3];
            $language->iso639_2_t = $row[4];
            $language->iso639_2_b = $row[5];
            $language->iso639_3 = $row[6];

            $languages[] = $language;
        }

        return $languages;
    }

    private static function getBy(string $field, string $value)
    {
        foreach(self::all() as $language) {
            if ($language->$field == $value) {
                return $language;
            }
        }

        return null;
    }

    public static function getByFamily(string $family)
    {
        return self::getBy('family', $family);
    }

    public static function getByName(string $name)
    {
        return self::getBy('name', $name);
    }

    public static function getByNativeName(string $nativeName)
    {
        return self::getBy('nativeName', $nativeName);
    }

    public static function getByIso639_1(string $iso639_1)
    {
        return self::getBy('iso639_1', $iso639_1);
    }

    public static function getByIso639_2_t(string $iso639_2_t)
    {
        return self::getBy('iso639_2_t', $iso639_2_t);
    }

    public static function getByIso639_2_b(string $iso639_2_b)
    {
        return self::getBy('iso639_2_b', $iso639_2_b);
    }

    public static function getByIso639_3(string $iso639_3)
    {
        return self::getBy('iso639_3', $iso639_3);
    }
}