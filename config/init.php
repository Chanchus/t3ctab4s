<?php

    //AUTO LOAD CLASSES

    //config file
    require_once 'config.php';

    //require_once('lib/template.php');

    function __autoload($class_name)
    {
        require_once 'lib/'.$class_name. '.php';
    }


    //echo 'auto loader included<br>';

?>