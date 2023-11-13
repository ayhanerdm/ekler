<?php
    /**
     * After autoloading the composer autoload file you can simply call the class as:
     */
    use \ayhanerdm\Iyelik;

    $iyelik = new Iyelik(true); // True by default and if you don't want to add single quotation mark before the possessive suffix, set to false.

    echo $iyelik->Cekimle(
        'Nursel', // A Turkish proper noun.

        /**
         * A possessive suffix to use.
         * Possible options: ::ILGI, ::BELIRTME; ::YONELME, ::BULUNMA; ::AYRILMA, ::BIRLIKTELIK (more to come)
         * Also you can use their content as well. 'in', 'e', 'de', 'den', 'ile'
         */
        Iyelik::ILGI,

        /**
         * Same with new Iyelik(BOOLEAN ARGUMENT), it's default is true and can be true or false.
         * You have to use single quotation mark before possessive suffixes while conjugating the proper noun in Turkish
         * but that's not the case for every possible word, also if the word ise a regular noun you just're not supposed to use
         * a single quotation mark, so if this argument is true it will add a single quotation mark, it won't if it's false.
         */
        true
    );