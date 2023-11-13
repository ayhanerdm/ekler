<?php
/**
 * @author Ayhan Erdem 
 * @category Class
 * @example /src/Example.php Example usage of this class.
 * @link https://github.com/ayhanerdm/ekler
 * @package ayhanerdm/ekler
 * @todo Add better DocBlock, better documentation.
 */
namespace ayhanerdm
{
    use Exception, InvalidArgumentException;
    class ekler
    {
        const YALIN                 = 'yalın';

        const ILGI                  = 'in';
        const AITLIK                = self::ILGI;
        const IN                    = self::ILGI;


        const BELIRTME              = 'i';
        const I                     = self::BELIRTME;

        const YONELME               = 'e';
        const E                     = self::YONELME;
    
        const BULUNMA               = 'de';
        const DE                    = self::BULUNMA;

        const AYRILMA               = 'den';
        const DEN                   = self::AYRILMA;
        const DAN                   = self::AYRILMA;

        const BIRLIKTELIK           = 'ile';
        const ILE                   = self::BIRLIKTELIK;

        const COKLUK                = 'cokluk';
        const LER                   = self::COKLUK;
        const LAR                   = self::COKLUK;

        const DEFAULT_KESME         = true;
        const DEFAULT_ISTENEN_EK    = self::YALIN;

        private static array $sertSessizler = ['ç', 'f', 'h', 'k', 'p','s', 'ş', 't'];
        private static array $buyukHarfler = ['A', 'I', 'E', 'İ', 'U','O', 'Ü', 'Ö', 'Ç', 'F', 'H', 'K', 'P', 'S', 'Ş', 'T'];
        private static array $kucukHarfler = ['a', 'ı', 'e', 'i', 'u','o', 'ü', 'ö', 'ç', 'f', 'h', 'k', 'p', 's', 'ş', 't'];

        public static bool $kelimeTuru;

        public static string $isim;
        public static string $isimKucuk;

        public static string $istenenEk;
        public static string $cekimliEk;

        public static bool $kesme;

        public static array $sesliler;
        public static string $sonSesli;
        public static string $sonHarf;

        public static string $sonuc;

        /**
         * Undocumented function
         *
         * @param [type] $kesme In order to add single quotation mark before possessive suffix set this argument to true, its default is also true.
         */
        public function __construct(bool $kesme = self::DEFAULT_KESME)
        {
            foreach(get_defined_vars() as $key => $val){ self::$$key = $val; }
        }

        /**
         * Undocumented function
         *
         * @param string $isim A string that keeps a proper noun.
         * @param string $istenenEk Possessive suffix to conjugate.
         * @param [type] $kesme In order to add single quotation mark before possessive suffix set this argument to true, its default is also true.
         * @return string
         */
        public static function Cekimle(string $isim, string $istenenEk = self::DEFAULT_ISTENEN_EK, bool $kesme = self::DEFAULT_KESME) :string
        {
            foreach(get_defined_vars() as $key => $val){ self::$$key = $val; }

            self::$isim = $isim;
            self::$isimKucuk = trim(str_replace(self::$buyukHarfler, self::$kucukHarfler, self::$isim));
            self::$sonHarf  = substr(self::$isim, -1);

            $bugcheckkaynak = array('ı', 'ö', 'ü');
            $bugcheckhedef = array('a', '`', '`');
            $bugfixed = str_replace($bugcheckkaynak, $bugcheckhedef, self::$isimKucuk);
            preg_match_all('/[aeiou`]/', $bugfixed, $bulunanlar);
            self::$sesliler = $bulunanlar[0];
            self::$sonSesli = end(self::$sesliler);

            switch(self::$istenenEk)
            {
                case 'yalın': { self::$cekimliEk = ''; } break;
                case 'in': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı'){ self::$cekimliEk = 'nın'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i'){ self::$cekimliEk = 'nin'; }
                    elseif(self::$sonHarf == 'u' || self::$sonHarf == 'o'){ self::$cekimliEk = 'nun'; }
                    elseif(self::$sonHarf == 'ü' || self::$sonHarf == 'ö'){ self::$cekimliEk = 'nün'; }
                    elseif(self::$sonSesli == 'a' || self::$sonSesli == 'ı'){ self::$cekimliEk = 'ın'; }
                    elseif(self::$sonSesli == 'e' || self::$sonSesli == 'i'){ self::$cekimliEk = 'in'; }
                    elseif(self::$sonSesli == 'u' || self::$sonSesli == 'o'){ self::$cekimliEk = 'un'; }
                    elseif(self::$sonSesli == '`' ) { self::$cekimliEk = 'ün'; }
                    else{ self::$cekimliEk = 'ın'; }
                } break;
                
                case 'e': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı' || self::$sonHarf == 'u' || self::$sonHarf == 'o'){ self::$cekimliEk = 'ya'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i' || self::$sonHarf == 'ü' || self::$sonHarf == 'ö'){ self::$cekimliEk = 'ye'; }
                    elseif(self::$sonSesli == 'a' || self::$sonSesli == 'ı' || self::$sonSesli == 'u' || self::$sonSesli == 'o'){ self::$cekimliEk = 'a'; }
                    elseif(self::$sonSesli == 'e' || self::$sonSesli == 'i' || self::$sonSesli == 'ö' || self::$sonSesli == 'ü'){ self::$cekimliEk = 'e'; }
                    else{ self::$cekimliEk = 'a'; }
                } break;
                
                case 'i': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı'){ self::$cekimliEk = 'yı'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i'){ self::$cekimliEk = 'yi'; }
                    elseif(self::$sonHarf == 'u' || self::$sonHarf == 'o'){ self::$cekimliEk = 'yu'; }
                    elseif(self::$sonHarf == 'ü' || self::$sonHarf == 'ö'){ self::$cekimliEk = 'yü'; }
                    elseif(self::$sonSesli == 'a' || self::$sonSesli == 'ı'){ self::$cekimliEk = 'ı'; }
                    elseif(self::$sonSesli == 'e' || self::$sonSesli == 'i'){ self::$cekimliEk = 'i'; }
                    elseif(self::$sonSesli == 'u' || self::$sonSesli == 'o'){ self::$cekimliEk = 'u'; }
                    elseif(self::$sonSesli == '`'){ self::$cekimliEk = 'ü'; }
                } break;
                    

                case 'de': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı' || self::$sonHarf == 'u' || self::$sonHarf == 'o'){ self::$cekimliEk = 'da'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i' || self::$sonHarf == 'ü' || self::$sonHarf == 'ö'){ self::$cekimliEk = 'de'; }
                    elseif(in_array(self::$sonHarf , self::$sertSessizler) and (self::$sonSesli == 'a' || self::$sonSesli == 'ı' || self::$sonSesli == 'u' || self::$sonSesli == 'o') ) { self::$cekimliEk = 'ta'; }
                    elseif(in_array(self::$sonHarf , self::$sertSessizler) and (self::$sonSesli == 'e' || self::$sonSesli == 'i' || self::$sonSesli == 'ü' || self::$sonSesli == 'ö') ) { self::$cekimliEk = 'te'; }
                    elseif(self::$sonSesli == 'a' || self::$sonSesli == 'ı' || self::$sonSesli == 'u' || self::$sonSesli == 'o'){ self::$cekimliEk = 'da'; }
                    elseif(self::$sonSesli == 'e' || self::$sonSesli == 'i' || self::$sonSesli == 'ü' || self::$sonSesli == 'ö'){ self::$cekimliEk = 'de'; }
                    elseif(in_array(self::$sonHarf , self::$sertSessizler)) { self::$cekimliEk = 'ta'; }
                    else{ self::$cekimliEk = 'da'; }  
                } break;        
                
                case 'den': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı' || self::$sonHarf == 'u' || self::$sonHarf == 'o'){ self::$cekimliEk = 'dan'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i' || self::$sonHarf == 'ü' || self::$sonHarf == 'ö'){ self::$cekimliEk = 'den'; }
                    elseif(in_array(self::$sonHarf , self::$sertSessizler) and (self::$sonSesli == 'a' || self::$sonSesli == 'ı' || self::$sonSesli == 'u' || self::$sonSesli == 'o') ) { self::$cekimliEk = 'tan'; }
                    elseif(in_array(self::$sonHarf , self::$sertSessizler) and (self::$sonSesli == 'e' || self::$sonSesli == 'i' || self::$sonSesli == 'ü' || self::$sonSesli == 'ö') ) { self::$cekimliEk = 'ten'; }
                    elseif(self::$sonSesli == 'a' || self::$sonSesli == 'ı' || self::$sonSesli == 'u' || self::$sonSesli == 'o'){ self::$cekimliEk = 'dan'; }
                    elseif(self::$sonSesli == 'e' || self::$sonSesli == 'i' || self::$sonSesli == 'ü' || self::$sonSesli == 'ö'){ self::$cekimliEk = 'den'; }
                    elseif(in_array(self::$sonHarf , self::$sertSessizler)) { self::$cekimliEk = 'tan'; }
                    else{ self::$cekimliEk = 'dan'; }
                } break;        
                
                case 'ile': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı' || self::$sonHarf == 'u' || self::$sonHarf == 'o'){ self::$cekimliEk = 'yla'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i' || self::$sonHarf == 'ü' || self::$sonHarf == 'ö'){ self::$cekimliEk = 'yle'; }
                    elseif(self::$sonSesli == 'a' || self::$sonSesli == 'ı' || self::$sonSesli == 'u' || self::$sonSesli == 'o'){ self::$cekimliEk = 'la'; }
                    elseif(self::$sonSesli == 'e' || self::$sonSesli == 'i' || self::$sonSesli == 'ö' || self::$sonSesli == 'ü'){ self::$cekimliEk = 'le'; }
                    else{ self::$cekimliEk = 'la'; }
                } break;

                case 'cokluk': {
                    if(self::$sonHarf == 'a' || self::$sonHarf == 'ı' || self::$sonHarf == 'o' || self::$sonHarf == 'u') { self::$cekimliEk = 'lar'; }
                    elseif(self::$sonHarf == 'e' || self::$sonHarf == 'i' || self::$sonHarf == 'ö' || self::$sonHarf == 'ü') { self::$cekimliEk = 'ler'; }
                    else { self::$cekimliEk = 'lar'; }
                }
            }
            if(self::$istenenEk != self::YALIN)
            {
                if(self::$kesme == true) return self::$sonuc = self::$isim."'".self::$cekimliEk;
                else return self::$sonuc = self::$isim.self::$cekimliEk;
            }
            else return self::$isim;
        }
    }
}
