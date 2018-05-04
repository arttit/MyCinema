<?php
namespace Core;
use \Core\Request;
use \Core\TemplateEngine;
class Controller
{  
    protected $variables = array();
    protected $_controller;
    protected $_action;     
    function __construct($controller,$action) 
    {
		$this->request = new Request;
        $this->_controller = $controller;
        $this->_action = $action;
    }
    function set($name,$value) 
    {
        return $this->variables[$name] = $value;
    }
    protected  function render($view, $scope = []) 
    { 
    	extract($scope); 
    	$f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(ucfirst($this->_controller))), $view]) . '.php'; 
       	if (file_exists($f)) { 
    		ob_start(); 
    		include($f); 
    		$views = ob_get_clean(); 
    		$template = new TemplateEngine;
    		$res = $template->template($f,$this->_controller,$view);
    		ob_start(); 
    		include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php'); 
    		include $res;
    	}
    }
    function __destruct()
    {
    	self::render($this->_action,$this->variables);
    }
}
