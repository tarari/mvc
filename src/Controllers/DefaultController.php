<?php


namespace Mvc\Controllers;


use Mvc\Controller;


class DefaultController extends Controller
{
    public function __construct(Request $request)
    {
        echo __CLASS__;
    }

    public function index(){
        echo 'accion';
    }



    function render()
    {

    }
}