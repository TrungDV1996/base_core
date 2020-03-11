<?php
namespace Core;

class Request
{
    private $POST;
    private $GET;

    public function __construct()
    {
        $this->POST = $_POST;
        $this->GET = $_GET;
    }

    public function post($name){
        return (isset($this->POST[$name])) ? $this->POST[$name] : null;
    }

    public function get($name){
        return (isset($this->GET[$name])) ? $this->GET[$name] : null;
    }

}