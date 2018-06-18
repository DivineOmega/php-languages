# PHP Languages

PHP Languages is a tiny package to help convert between languages names (such as English, French, German) and various ISO language codes (such as en, fr, de).

## Installation

To install PHP Languages, just run the following Composer command.

```bash
composer require divineomega/php-languages
```

## Usage

First, you need to get a `Language` object. You can get object by
language name or ISO code. You can also find all languages that belong
to a particular family.

```php
use \DivineOmega\Languages\Language;

$language = Language::getByName('German');
$language = Language::getByNativeName('Deutsch');
$language = Language::getByIso639_1('de');
$language = Language::getByIso639_2_t('deu');
$language = Language::getByIso639_2_b('ger');
$language = Language::getByIso639_3('deu');
$languages = Language::getByFamily('Indo-European');
```

Once you have your `Language` object, you can access its various public 
properties to yield information about the language.

```php
echo $language->family;         // German
echo $language->name;           // Deutsch
echo $language->nativeName;     // de
echo $language->iso639_1;       // deu
echo $language->iso639_2_t;     // ger
echo $language->iso639_2_b;     // deu
echo $language->iso639_3;       // Indo-European
```