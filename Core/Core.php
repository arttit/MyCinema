<?php 
namespace Core; 
class Core { 
	public static function run() 
	{ 
		$url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));
		include 'routes.php';
		$route = Router::get($url);
		$class = 'Controller\\'.ucfirst($route["controller"])."Controller";
		if(class_exists($class)){
			$controller = new $class($route['controller'],$route['action']);
			$method = array($controller, $route["action"]);
        	if( is_callable( $method )){
            	call_user_func($method);
            	return true;
      		}else{
				include ('src/View/Error/404.php');
				return false;
			}
		}else{
			include ('src/View/Error/404.php');
			return false;
		}
	}
}