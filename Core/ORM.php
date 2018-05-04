<?php
namespace Core;
class ORM extends Database
{
	private $db;
	public function create($table, $fields) 
	{
		$db = parent::__construct();
		$keys = array_keys($fields);
		$values = array_values($fields);
		for ($i=0; $i <count($keys) ; $i++) { 
			if($i==0){
				$allKeys = $keys[$i];
				$allValues = "'".$values[$i]."'";
			}else{
				$allKeys .= ','.$keys[$i];
				$allValues .= ','."'".$values[$i]."'";
			}
		}
		$sql = "INSERT INTO $table($allKeys) values($allValues)";
		if($exe = $db->query($sql)){
			$id =  $db->lastInsertId();
		}
		return $id;	// retourne un id 
	}		 
	public function read($table, $id) 
	{
		$db = parent::__construct();
		$sql = "SELECT * FROM $table WHERE id='$id'";
		$exe = $db->query($sql);
		$return = array();
		while ($res = $exe->fetch()) {
			array_push($return, $res);
		}
		return $return;		 // retourne un tableau associatif de l'enregistrement 
	}
	public function update($table, $id, $fields) 
	{
		$db = parent::__construct();
		$keys = array_keys($fields);
		$values = array_values($fields);
		for ($i=0; $i <count($keys) ; $i++) { 
			$sql = "UPDATE $table SET $keys[$i]='$values[$i]' WHERE id='$id'";
			$exe = $db->query($sql);
		}
		if($exe != false){$res= true;}else{$res= false;}
		return $res;	// retourne un booléen 
	} 
	public function delete($table, $id) 
	{
		$db = parent::__construct();
		if($table === 'historique'){$sql="DELETE FROM $table WHERE id_film='$id'";}else{
		$sql = "DELETE FROM $table WHERE id='$id'";}
		$exe = $db->query($sql);
		if($exe != false){$res= true;}else{$res= false;}
		return $res;	// retourne un booléen 
	} 
	public function find($table, $params = array( 'WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT' => '' )) 
	{
		$keys = array_keys($params);
		$values = array_values($params);
		$return=array();
		if(isset($values[2]) && isset($keys[2]) && $values[2]=='' && $keys[2]=='LIMIT'){$keys[2]='';}
		$db = parent::__construct();
		if(!empty($params)){
			$sql = "SELECT * FROM $table $keys[0] $values[0] $keys[1] $values[1] $keys[2] $values[2]";
		}else{$sql="SELECT * FROM $table";}
		$exe= $db->query($sql);
		while ($res = $exe->fetch()) {
			array_push($return, $res);
		}
		return $return;		// retourne un tableau d'enregistrements
	} 
}
?>