<?php
namespace Core;

use Core\View;

class Error
{
    protected $msg;
    protected $code;
    protected $view;
    public function __construct()
    {
        $this->view = new View;
    }

    /**
     * Show message.
     *
     * @param $msg
     * @param $code
     *
     * @return Message
     *
     **/
    public function index($msg, $code, $base)
    {
            $this->view->render("error.error", compact('msg', 'code', 'base'));
    }
}