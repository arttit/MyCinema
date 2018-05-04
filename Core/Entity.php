<?php
namespace Core;
class Entity extends ORM
{
	public function __construct()
	{
	}
	public function create($table, $fields) 
	{
		$res = ORM::create($table,$fields);
		return $res;
	}
	public function read($table,$id)
	{
		$res = ORM::read($table,$id);
		return $res;
	}
	public function update($table, $id, $fields) 
	{
		$res = ORM::update($table,$id,$fields);
		return $res;
	}
	public function  delete($table, $id) 
	{
		$res = ORM::delete($table,$id);
		return $res;
	}
	public function find($table, $params = array()) 
	{
		$res = ORM::find($table,$params);
		return $res;
	}
}