<?php


namespace Mvc;


class Request
{
    private $controller;
    private $action;
    private $params;
    private $method;

    function __construct(Array $arraycont){
        $this->uri=$arraycont[0];
        $this->action=$arraycont[1];
        $this->params=$arraycont[2];
        $this->method=$arraycont[3];
    }
}