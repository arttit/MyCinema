<?php
namespace Core;
class Router
{
	private static $routes;
	public static function connect($url, $route)
	{
		self::$routes[$url] = $route;
	}
	public static function get($url) 
	{ 
		$explode = explode('/', $url);
		$params = [];
		for ($i=3; $i <count($explode) ; $i++) { 
			$params[] = $explode[$i];
		}
		if(!empty($params)){
			$url='';
			for ($i=0; $i <count($explode) ; $i++) {
				if($i+1 != count($explode)){
					if($i==0){ 
						$url .= $explode[$i];
					}else{
						$url .= '/'.$explode[$i];
					}
				}
			}
			$url .= '/';
		}
		if(isset(self::$routes[$url])){
			if(!empty($params)){
				self::$routes[$url]['params'] = $params;
			}
			return self::$routes[$url];
		}
	}
}
?>