<?php
require_once 'vendor/autoload.php';

use Core\App;

class index
{
    public function __construct()
    {
        App::getUrl();
    }
}

if (!isset($index)) {
    $index = new index;
}