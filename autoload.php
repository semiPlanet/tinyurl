<?php

spl_autoload_register(function($class_name){

    $class_file = $class_name.'.php';

    if(file_exists($class_file))
    {
        require $class_file;
    }
});


function view($view, $arrays = [])
{
    extract($arrays, EXTR_PREFIX_SAME, "wddx");

    require 'lib/views/header.inc.php';

    require 'lib/views/'.$view.'.inc.php';

    require 'lib/views/footer.inc.php';
}
