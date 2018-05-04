<?php
namespace Core;
class Request
{
	function __construct()
	{
		$POST=array();
		$GET=array();
		if(isset($_POST) && !empty($_POST)){
			foreach($_POST as $post){
				$post = trim($post);
				$post = stripslashes($post);
				$post = htmlspecialchars($post);
				$post = trim($post);
				array_push($POST, $post);
			}
			return $POST;
		}elseif(isset($_GET) && !empty($_GET)){
			foreach ($_GET as $get) {
				$get = trim($get);
				$get = stripcslashes($get);
				$get = htmlspecialchars($get);
				$get = trim($get);
				array_push($GET, $get);
			}
			return $GET;
		}
	}
}
?>