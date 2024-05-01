<?php
    require_once __DIR__.'/src/Ekler.php';

    /**
     * After autoloading the composer autoload file you can simply call the class as:
     */
    use \ayhanerdm\Ekler;

    $iyelik = new Ekler(true); // True by default and if you don't want to add single quotation mark before the possessive suffix, set to false.

    echo Ekler::Cekimle(
        'Nursel', // A Turkish proper noun.

        /**
         * A possessive suffix to use.
         * Possible options: ::ILGI, ::BELIRTME; ::YONELME, ::BULUNMA; ::AYRILMA, ::BIRLIKTELIK
         * Also you can use their content as well. 'in', 'e', 'de', 'den', 'ile'
         */
        Ekler::ILGI,

        /**
         * Same with new Ekler(BOOLEAN $apostrophe), default is true.
         * You have to use apostrophe before possessive suffixes while conjugating the proper noun in Turkish
         * but that's not the case for every possible word, also if the word is a regular noun you're not supposed
         * to use a apostrophe, so if this argument is true it will add a apostrophe and it won't add an apostrophe
         * if it's false.
         */
        true
    );

    echo PHP_EOL; // OR

    echo $iyelik->Cekimle(
        'Nursel', // A Turkish proper noun.

        /**
         * A possessive suffix to use.
         * Possible options: ::ILGI, ::BELIRTME; ::YONELME, ::BULUNMA; ::AYRILMA, ::BIRLIKTELIK
         * Also you can use their content as well. 'in', 'e', 'de', 'den', 'ile'
         */
        Ekler::ILGI,

        /**
         * Same with new Ekler(BOOLEAN $apostrophe), default is true.
         * You have to use apostrophe before possessive suffixes while conjugating the proper noun in Turkish
         * but that's not the case for every possible word, also if the word is a regular noun you're not supposed
         * to use a apostrophe, so if this argument is true it will add a apostrophe and it won't add an apostrophe
         * if it's false.
         */
        true
    );
