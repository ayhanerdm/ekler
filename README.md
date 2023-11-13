# ayhanerdm/ekler
This class let's you easily conjugate a Turkish proper noun correctly.

## Install
````
composer require ayhanerdm/ekler
````
## Example Usage
````
use \ayhanerdm\ekler;
echo ekler::Cekimle('Nursel', \ayhanerdm\ekler::ILGI, true);
````
## Example Usage with Explanations
````
/**
 * After autoloading the composer autoload file you can simply call the class as:
 */
  use \ayhanerdm\ekler;
  $ekler = new ekler; // First argument is True by default and if you don't want to add single quotation mark before the possessive suffix, set to false.

  echo $ekler->Cekimle(
  'Nursel', // A Turkish proper noun.

/**
 * A possessive suffix to use.
 * Possible options: ::ILGI, ::AITLIK, ::BELIRTME; ::YONELME, ::BULUNMA; ::AYRILMA, ::BIRLIKTELIK, ::COKLUK
 * And also ::IN, ::I, ::E, ::DE, ::DEN, ::DAN, ::ILE, ::LER, ::LAR
 * Also you can use their content as well. 'in', 'i', e', 'de', 'den', 'dan', 'ile', 'ler, lar'
 */
  ekler::ILGI,

/**
 * Same with new ekler(BOOLEAN ARGUMENT), its default is true and can be true or false.
 * You have to use single quotation mark before possessive suffixes while conjugating the proper noun in Turkish
 * but that's not the case for every possible word, also if the word ise a regular noun you just're not supposed to use
 * a single quotation mark, so if this argument is true it will add a single quotation mark, it won't if it's false.
 */
  true
);
````
