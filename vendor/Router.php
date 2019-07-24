<?php
namespace vendor;

use vendor\View;

class Router {
	
	protected $routes = [];
	protected $params = [];
	
	function __construct(){
		
		$route = require_once __DIR__ . '/../config/router.php';
		
		foreach($route as $key => $val){
			
			
			$this->add($key, $val);
		}
		
		
	}
	
	public function add($route, $params){
		
		$route = '#^' . $route . '$#';
		$this->routes[$route] = $params;
		
	}
	
	
	public function match(){
		
		
		$url = trim($_SERVER['REQUEST_URI'],'/');
		foreach ($this->routes as $route => $params){
			 
		if(preg_match($route, $url, $matches)){
			
			$this->params = $params;
			return true;
		}
	}
	return false;
	}
	
	  public function run(){
        if ($this->match() == true) {
            $path = 'controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if($_GET) {
                    var_dump($_GET);
                }
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo View::errorCode(404);
                }
            } else {
                echo View::errorCode(404);
            }
        } else {
           echo View::errorCode(404);
        }
    }
}
?>