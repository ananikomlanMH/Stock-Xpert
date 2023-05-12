<?php
 namespace App\Helpers\NumberHelper;

 class NumberHelper{

     /**
      * @param float|null $number
      * @return string
      */
     public static function CurrencyFormat(?float $number):string{
        return number_format(round($number ?: 0),0,'.',' ') . ' FCFA';
    }

     public static function CurrencyFormat2(float $number):string{
         return number_format(round($number),0,'.',' ');
     }

     public static function removeSpaceToInt($text): int{
         if (empty($text)){
             return 0;
         }
         return (int)str_replace(' ', '', $text);
     }
 }
