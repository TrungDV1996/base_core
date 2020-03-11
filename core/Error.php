<?php
namespace Core;

class Error
{
    /**
     * Show message.
     *
     * @param $msg
     *
     * @return Message
     *
     **/
    public function index($msg)
    {
        echo "<h1>$msg</h1>";
    }
}