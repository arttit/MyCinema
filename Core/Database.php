<?php
namespace Core;
use \PDO;
class Database
{
	static protected $_instance = null;
	protected $_db;
	static public function getInstance()
	{
		if(is_null(self::$_instance))
			self::$_instance = new Database();
		return self::$_instance;
	}
	protected function __construct()
	{
		try{ 
			$db = new PDO(
			"mysql:host=localhost;dbname=piephp;charset=utf8",
			"root",
			""
			);
		}catch(PDOException $e){
			die($e->getMessage);
		}
		return $db;
	}
}
?>