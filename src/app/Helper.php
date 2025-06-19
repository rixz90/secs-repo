<?php

namespace App;

class Helper {
    public static function dd($methods) {
        echo "<pre>";
        var_dump($methods);
        echo "</pre>";
        exit(); 
    }
}