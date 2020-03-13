<?php
namespace App\Helpers;

use Core\Error;
class Helper
{
    public function base_url() {
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") .
            $_SERVER['HTTP_HOST'] . '/' . explode('/', rtrim($_SERVER['REQUEST_URI'], '/'))[1] . '/';

        return $baseUrl;
    }

    public function newError()
    {
        return new Error;
    }
}