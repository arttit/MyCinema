<?php
function my_autoloader($class) 
{
	$class_explode = explode('\\',$class);
	if($class_explode[0] == 'Core'){
		if(file_exists($class.'.php')){
			include $class.'.php';
		}
	}elseif($class_explode[1]=='ORM' || $class_explode[1] == 'Entity'){
		if(file_exists('Core\\'.$class_explode[1].'.php')){
			include_once 'Core\\'.$class_explode[1].'.php';
		}
	}else{
		if(strpos($class_explode[1],'Model') != false){
			if(file_exists('src\Model\\'.$class_explode[1].'.php')){
				include 'src\Model\\'.$class_explode[1].'.php';
			}
		}else{
			if(file_exists('src\Controller\\'.$class_explode[1].'.php')){
				include 'src\Controller\\'.$class_explode[1].'.php';
			}
		}
	}
}
spl_autoload_register('my_autoloader');
?>