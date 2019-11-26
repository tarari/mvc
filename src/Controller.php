<?php


namespace Mvc;


abstract class Controller implements ViewDataInterface
{
    protected $uri;
    protected $method;


    function error(){
        echo 'Metodo no existe';
    }

    public function getParams()
    {

    }
}