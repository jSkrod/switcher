<?php
namespace Etermed\Switcher;

class Switcher{
    public static $digits;
  
    public static function convert($value){
        self::prepareInput($value);
        
        
        
    }
    
    private static function prepareInput($value){
        $array = str_split($value);
        
        while(count($array) % 3){
            array_unshift($array,"0");
        }
        
        $array = array_reverse($array);
        self::$digits = array_chunk($array,3);
    }


};