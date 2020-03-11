<?php
namespace App\Http\Controllers;

use Core\Controller;
use App\Helpers\Helper;

class IndexController extends Controller
{
    public function index()
    {
        header('location: ' . Helper::base_url() . 'user');
    }

}