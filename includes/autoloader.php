<?php

//load classes automatically, as soon as you instantiate a class.

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    $path = '../classes/';
    
    $extension = ".class.php";
    $fullPath = $path.$className.$extension;


    if(!file_exists($fullPath)){
        return false;
    }
    include_once $fullPath;
}
?>