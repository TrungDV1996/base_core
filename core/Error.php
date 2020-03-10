<?php
namespace Core;

use http\Message;

class Errors
{
    /**
     * Show message.
     *
     * @return Message
     *
     **/
    public function index($msg)
    {
        echo "<h1>$msg</h1>";
    }
}