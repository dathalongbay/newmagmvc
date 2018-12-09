<?php
setlocale(LC_ALL, 'en_US.UTF8');
class Helper {

    public function __construct()
    {

    }


    /*$slug = slugit("thank you for visiting");
    echo $slug;*/
    function slug($str, $replace=array(), $delimiter='-') {
        if ( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }

}

/**
 * Example helper function
 */
function getIpGuest() {

}