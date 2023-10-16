<?php
//load config
require_once 'config/config.php';
//loaad helper
require_once 'helper/url_helper.php';
require_once 'helper/session_helper.php';

//Autoload Core Libraries
spl_autoload_register(function ($className) {
    $classFile = __DIR__ . '/libraries/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
//    require_once 'libraries/' . $className . '.php';
});