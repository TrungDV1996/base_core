<?php
namespace App\Http\Controllers;

use Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function index()
    {
        $result = User::getAll();
        var_dump($result);
    }
}