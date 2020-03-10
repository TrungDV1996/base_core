<?php
namespace Core;

use Core\Controller;
use Core\Model;
use Core\Errors;

class App
{
    /**
     * Get url.
     *
     **/
    public function getUrl()
    {
        $url = $_GET["url"] ?? null;
        $url = explode('/', rtrim($url, '/'));
        $ctrl = !empty($url[0]) ? $url[0] : 'IndexController';
        $method = !empty($url[1]) ? $url[0] : 'index';
        $params = isset($url[2]) ? array_slice($url,2) : [];
        App::loadController($ctrl, $method, $params);
    }

    /**
     * Load controller in url.
     *
     * @param $nameController
     * @param $methodController
     * @param $paramsController
     *
     * @return render
     **/
    public function loadController($nameController, $methodController, $paramsController)
    {
        var_dump($nameController, $methodController, $paramsController);
        $pathController = 'app/Http/Controllers/' . $nameController . '.php';
        if (file_exists($pathController)) {
            if (method_exists($nameController, $methodController)) {
                var_dump(method_exists($nameController, $methodController));
                call_user_func_array(array($nameController, $methodController), $paramsController);
            }else{
                var_dump($nameController::$methodController);
//                $msg = "ERROR: Method $methodController not exist in $nameController Controller!!!";
//                Errors::index($msg);
                echo 'sai method';
            }
        } else {
            echo 'sai controller';
//            $msg = "Controller $nameController not found.";
//            Errors::index($msg);
        }
    }
}