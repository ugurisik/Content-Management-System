<?php
class System
{
    protected $controller = 'main';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        $url = $this->checkFile($url);
        $url = $this->checkClass($url);
        $url = $this->checkMethod($url);
        $this->params = $this->clearUrl($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            $url[0] = $this->controller;
            $url[1] = $this->method;
            return $url;
        }
    }

    public function checkFile($url = [])
    {
        if ($url[0] == 'admincp') {
            $controllerPath = ADMIN_CONTROLLER_PATH;
            array_shift($url);
        } else {
            $controllerPath = CONTROLLER_PATH;
        }
        if (file_exists($controllerPath . $url[0] . '.php')) {
            $this->controller = $url[0];
            array_shift($url);
            require_once  $controllerPath . $this->controller . '.php';
        } else {
            require_once  $controllerPath . $this->controller . '.php';
        }
        return $url;
    }

    public function checkMethod($url = [])
    {
        if (isset($url[0])) {
            if (method_exists($this->controller, $url[0])) {
                $this->method = $url[0];
                array_shift($url);
            }
        } else {
            $this->method = 'index';
        }
        return $url;
    }

    public function checkClass($url = [])
    {
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
        }
        return $url;
    }

    public function clearUrl($url = [])
    {
        if ($url[0] == $this->controller && $url[1] == $this->method) {
            array_shift($url);
            array_shift($url);
        }
        return $url;
    }
}
