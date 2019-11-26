<?php
   
    //development mode
    ini_set('display_errors','On');
    //autoload
    require __DIR__.'/vendor/autoload.php';

    use Mvc\App;

    App::run();

