<?php


namespace Mvc;


interface ViewDataInterface
{
    //from UIRequest extract params
    function getParams();
    // renders view
    function render();

}