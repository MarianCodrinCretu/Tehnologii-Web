






<?php


class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    public function __construct($pdo, $controller=null, $method=null)
    {
        $url = $this->parseUrl();


        if ($controller!=null)
        {
        $this->controller=$controller;
        }

        if ($method!=null)
        {
          $this->method=$method;  
        }
        if ($url[0] == 'movie') {
            $url[0] = 'MovieController';
        }
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else if ($this->controller == null)
        {
            $this->controller = 'Home';
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];

        array_unshift($this->params, $pdo);

        call_user_func_array([$this->controller, $this->method], $this->params);

    }
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}