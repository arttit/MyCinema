<?php
namespace Model;
use \Core\Entity;
use \Controller\UserController;
class UserModel extends Entity
{
	private $email;
	private $password;
	public function getEmail()
	{
  		return $this->email;
  	}
  	public function getPassword()
  	{
  		return $this->password;
  	}
	public function save($email,$password,$name,$lastName)
	{
		$returnRes = Entity::create('users',array("email" => $email,"password" => $password, 'nom' => $name, 'prenom' => $lastName));
		return $returnRes;
	}	
	public function login($email, $password)
	{
		$returnRes = Entity::find('users',$params = array( 'WHERE' => 'email="'.$email.'"', 'and' => 'password="'.$password.'"', 'LIMIT' => '1'));
		return $returnRes;
	}
	public function show($id)
	{
		$returnRes = Entity::read('users',$id);
		return $returnRes;
	}
	public function random()
	{
		$returnRes = Entity::find('film',$params = array('WHERE' => 'id!=0', 'ORDER BY' => 'RAND()' ,'LIMIT' => '4'));
		return $returnRes;
	}
	public function replace($id,$fields)
	{
		$returnRes = Entity::update('users',$id,$fields);
		return $returnRes;
	}
	public function remove($id)
	{
		$returnRes = Entity::delete('users',$id);
		return $returnRes;
	}
}
?>