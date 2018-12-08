<?php

namespace DivineOmega\Languages;

class Language
{
    /**
     * Get all language informations
     *
     * @return array
     */
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

    /**
     * Get Language class with specific field and value
     *
     * @param string $field
     * @param string $value
     *
     * @return Language|null
     */
    private static function getBy(string $field, string $value)
    {
        foreach(self::all() as $language) {
            if ($language->$field == $value) {
                return $language;
            }
        }

        return null;
    }

    /**
     * Get multiple languanges informations with specific field and value
     *
     * @param string $field
     * @param string $value
     *
     * @return array
     */
    private static function getMultipleBy(string $field, string $value)
    {
        $languages = [];

        foreach(self::all() as $language) {
            if ($language->$field == $value) {
                $languages[] = $language;
            }
        }

        return $languages;
    }

    /**
     * Get languages with specific family
     *
     * @param string $family
     *
     * @return array
     */
    public static function getByFamily(string $family)
    {
        return self::getMultipleBy('family', $family);
    }

    /**
     * Get language with name
     *
     * @param string $name
     *
     * @return Language|null
     */
    public static function getByName(string $name)
    {
        return self::getBy('name', $name);
    }

    /**
     * Get language with native name
     *
     * @param string $nativeName
     *
     * @return Language|null
     */
    public static function getByNativeName(string $nativeName)
    {
        return self::getBy('nativeName', $nativeName);
    }

    /**
     * Get language with specific iso639_1 encoding
     *
     * @param string $iso639_1
     *
     * @return Language|null
     */
    public static function getByIso639_1(string $iso639_1)
    {
        return self::getBy('iso639_1', $iso639_1);
    }

    /**
     * Get language with specific iso639_2_t encoding
     *
     * @param string $iso639_2_t
     *
     * @return Language|null
     */
    public static function getByIso639_2_t(string $iso639_2_t)
    {
        return self::getBy('iso639_2_t', $iso639_2_t);
    }

    /**
     * Get language with specific iso639_2_b encoding
     *
     * @param string $iso639_2_b
     *
     * @return Language|null
     */
    public static function getByIso639_2_b(string $iso639_2_b)
    {
        return self::getBy('iso639_2_b', $iso639_2_b);
    }

    /**
     * Get language with specific iso639_3 encoding
     *
     * @param string $iso639_3
     *
     * @return Language|null
     */
    public static function getByIso639_3(string $iso639_3)
    {
        return self::getBy('iso639_3', $iso639_3);
    }
}
