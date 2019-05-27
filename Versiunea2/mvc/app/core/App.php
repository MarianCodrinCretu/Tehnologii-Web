






<?php

/*
class App {
	protected $controller = 'home';

	protected $method = 'index';

	protected $params = [];

	public function __construct($pdo, $v_controller='home', $v_method='index') {
		$url = $this->parseUrl();
		//var_dump($url);
        //print_r($url);
        //echo 'signal';7z

        if(count($url) < 2)
        {
			$this->controller = $v_controller;
			$this->method = $v_method;
	    }
	    else {
			if(file_exists('../app/controllers/' . $url[0] . '.php')) {
				$this->controller = $url[0];
				$this->method = $url[1];
			}
			$this->method = $v_method;
			// var_dump($this->controller);
}
		require_once '../app/controllers/' . $this->controller . '.php';

		$this->controller =new $this->controller;
		$this->params = $url ? array_values($url) : [];
        array_unshift($this->params, $pdo);
        //echo $this->method;
	    call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseUrl() {
		if (isset($_GET['url'])) {
			// echo $_GET['url'];
			 return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
		else {
			return [];
		}
	}
}

*/

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    public function __construct($pdo, $controller=null, $method=null)
    {
        $url = $this->parseUrl();

        //var_dump($url);
//        echo 'URL: ';
//        print_r($url);
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
//        echo '<br>';
//        print_r($url);
//        echo '<br>';
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        // var_dump($this->controller);
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
//        print_r($this->params);
        array_unshift($this->params, $pdo);
//        print_r($this->params);
        call_user_func_array([$this->controller, $this->method], $this->params);
//        echo $this->controller;
    }
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // echo $_GET['url'];
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}