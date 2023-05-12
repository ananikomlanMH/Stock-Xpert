<?php

namespace App\DateHelper;

    class DateHelper {
    
    Public static $Days = ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
    
    Public static $Months = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];
    
    public static function getDates(int $date1 , int $date2): string{
        $monthsOfDate1 = date('n',$date1);
        $monthsOfDate2 = date('n',$date2);
        $YearOfDate1 = date('Y',$date1);
        $YearOfDate2 = date('Y',$date2);

        if ($date1 == $date2){
            return date('d',$date2). " ". self::$Months[date('n',$date1)-1] . " ".$YearOfDate1;
        }else if($monthsOfDate1 === $monthsOfDate2 && $YearOfDate1 === $YearOfDate2){
            return "Du ".date('d',$date1). " Au " .date('d',$date2). " ". self::$Months[date('n',$date1)-1] . " ".$YearOfDate1;
        }else if($monthsOfDate1 !== $monthsOfDate2 && $YearOfDate1 === $YearOfDate2){
            return "Du ".date('d',$date1). " ".self::$Months[date('n',$date1)-1] . " Au ".date('d',$date2). " ".self::$Months[date('n',$date2)-1] . " " . $YearOfDate1;
        }else {
            return "Du ".date('d',$date1). " ". self::$Months[date('n',$date1)-1] . " ". $YearOfDate1 ." Au " .date('d',$date2). " ". self::$Months[date('n',$date2)-1] . " ". $YearOfDate2;
        }
    }

    public static function getOneDate(int $date1): string{
            return date('d',$date1). " ". self::$Months[date('n',$date1)-1] . " ".date('Y',$date1);
    }

    public static function getOneDatewithHour(int $date1): string{
            return date('d',$date1). " ". self::$Months[date('n',$date1)-1] . " ".date('Y',$date1). " à ".date('H:i',$date1);
    }

    public static function getCurrentMonth(): string{
        $date = time();
        return self::$Months[date('n',$date)-1];
    }
}