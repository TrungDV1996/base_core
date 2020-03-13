<?php
namespace Core;
use Jenssegers\Blade\Blade;

class View
{
    private $blade;
    public function __construct()
    {
        $this->blade = new Blade('resources/views', 'cache');
    }

    public function render($view, $data = array()){
        echo $this->blade->make($view, $data);
    }
}