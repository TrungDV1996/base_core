<?php
namespace App\Http\Controllers;

use Core\Controller;
use Core\View;
use App\Models\User;
use App\Helpers\Helper;

class UserController extends Controller
{
    protected $userModel = null;
    protected $view = null;
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User;
        $this->view = new View;
    }

    public function index()
    {
        $result = $this->userModel->getAll();
        $baseUrl = Helper::base_url();

        $this->view->render('user.index', compact('result', 'baseUrl'));
    }

    public function edit($id)
    {
        $result = $this->userModel->getById($id);
        $baseUrl = Helper::base_url();
        if (empty($result)) {
            return Helper::newError()->index('Id '. $id . ' not found', 404, $baseUrl);
        }

        $this->view->render('user.edit', compact('result', 'baseUrl'));
    }

    public function update(){
        $data = [
            'id'  =>  $this->Request->post('id'),
            'name'  =>  $this->Request->post('username'),
            'email'  =>  $this->Request->post('email')
        ];
        $this->userModel->update($data);

        header('location: ' . Helper::base_url() . 'user');
    }
}