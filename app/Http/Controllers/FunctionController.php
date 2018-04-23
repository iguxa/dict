<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionController extends Controller
{
    public static function get_command($letter){
        $real = false;
        $target = mb_strtolower ($letter);
        $mask = preg_replace("/[^а-яё ]/iu", '', $target);
        $str = preg_replace("/ {2,}/"," ",$mask);
        $pieces = explode(" ", $str);
        $m = count($pieces)-1;
        for($i = 0;$i <= $m;$i++){
            if(iconv_strlen($pieces[$i],'UTF-8')>2) {
                $check = mb_substr($pieces[$i], 0, 4);
                if (!$check) break;
                $real .= '*' . $check . '* ';
            }
        }
        return $real;
    }
}
