<?php
namespace Core;

use Core\Controller;
use Core\Model;
use Core\Error;
use App\Helpers\Helper;

class App
{
    /**
     * Get url.
     *
     **/
    public function getUrl()
    {
        $url = $_GET['url'] ?? null;
        $url = explode('/', rtrim($url, '/'));
        $ctrl = !empty($url[0]) ? $url[0] : 'Index';
        $method = !empty($url[1]) ? $url[1] : 'index';
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
        $nameController = $nameController.'Controller';
        $pathController = 'app/Http/Controllers/' . $nameController . '.php';
        if (file_exists($pathController)) {
            $classController = '\App\Http\Controllers\\'. $nameController;
            $objectController = new $classController;
            if (method_exists($objectController, $methodController)) {
                call_user_func_array([$objectController, $methodController], $paramsController);
            }else{
                $msg = "ERROR: Method $methodController not found in $nameController!!!";
                $baseUrl = Helper::base_url();
                return Helper::newError()->index($msg, 404, $baseUrl);
            }
        } else {
            $msg = "$nameController not found.";
            $baseUrl = Helper::base_url();
            return Helper::newError()->index($msg, 404, $baseUrl);
        }
    }
}