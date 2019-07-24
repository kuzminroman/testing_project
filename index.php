<?php
use vendor\Router;

spl_autoload_register(function ($class_name) {
    $path = str_replace('\\', '/', $class_name . '.php');
	if(file_exists($path)){
		
		require $path;
		
	}
});
session_start();
$Route = new Router;
$Route->run();

?>