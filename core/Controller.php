<?php
namespace Core;

use Core\Request;

class Controller
{
    protected $Request;

    public function __construct()
    {
        $this->Request = new Request();
    }

    public function loadModel($name){
        $path_model = "/app/Models/$name.php";
        if (file_exists($path_model)) {
            $classModel = '\App\Models\\'. $name;
            if (!isset($classModel)) {
                $classObject =  new $classModel;

                return $classObject;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}