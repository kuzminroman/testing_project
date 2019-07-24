<?php
namespace vendor;

class View{
	
	public $path;
	public $route;
	public $layout = 'default';
	
	public function __construct($route){
		
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action']; 

	}
	
	public function render($title, $vars = []){
		extract($vars);
		if(file_exists('views/' . $this->path . '.php')){
			ob_start();
		require 'views/' . $this->path . '.php';
		$content = ob_get_clean();
		require 'views/layout' . '/' . $this->layout . '.php';
		} else 'Вид не найден';
	}


    public static function errorCode($code){
		
		http_response_code($code);
		require 'views/errors/' . $code . '.php';
		exit;
	}
	
	public function redirect($url){
		
		header("location: ".$url);
		exit;
	}



}




?>