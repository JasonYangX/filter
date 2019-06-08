<?php
namespace vendor;

class Core
{
    private $defaultController = 'index';
    private $defaultAction     = 'index';

    public function run()
    {
        spl_autoload_register(array($this, 'loader'));
        $this->router();
    }

    public function loader($className)
    {
        $file = APP_PATH . str_replace('\\', '/', $className) . '.php';
        require($file);
    }

    public function router()
    {
        $queryUri = ltrim($_SERVER['REQUEST_URI'], '/');
        $uriStart = strpos(ltrim($queryUri, '/'), '?');
        $url      = empty($uriStart) ? $queryUri : substr($queryUri, 0, $uriStart);

        $controllerName = $this->defaultController;
        $action          = $this->defaultAction;
        if (!empty($url)) {
            $urlArr         = explode('/', $url);
            $controllerName = !empty($urlArr[0]) ? $urlArr[0] : $controllerName;
            $action         = !empty($urlArr[1]) ? $urlArr[1] : $action;
        }
        $controllerName = ucfirst(strtolower($controllerName));
        if (! file_exists(APP_PATH.'app/controllers/'.$controllerName.'.php')) {
            exit('系统错误');
        }
        $controller = 'app\\controllers\\'.$controllerName;
        $dispatch   = new $controller($controllerName, $action);
        call_user_func_array(array($dispatch, $action), $_REQUEST);
    }
}
