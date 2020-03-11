<?php
namespace App\Http\Controllers;

use Core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('user');
    }

    public function index()
    {

    }
}