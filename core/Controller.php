<?php
namespace Core;

use Core\Request;

class Controller
{
    protected $Request;

    public function __construct()
    {
        $this->Request = new Request();
    }
}