<?php
namespace App\Http\Controllers;

use Core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        var_dump($this->loadModel('User'));
    }

    public function index()
    {
        $result = $this->user->getAll();
        var_dump($result);
    }
}