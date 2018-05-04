<?php
namespace Model;
use \Core\Entity;
use \Controller\FilmController;
class FilmModel extends Entity
{
	public function listFilms($params)
	{
		$res = Entity::find('film',$params);
		return $res;
	}
	public function filmInfo($id)
	{
		$res = Entity::find('film',$params = array( 'WHERE' => 'id="'.$id.'"', 'ORDER BY' => 'id ASC', 'LIMIT' => '1'));
		return $res;
	}
	public function FilmGenre($id)
	{
		$res = Entity::find('genre',$params = array('WHERE' => 'id="'.$id.'"','ORDER BY' => 'id ASC', 'LIMIT' => '1' ));
		return $res;
	}
	public function FilmDistrib($id)
	{
		$res = Entity::find('distrib', $params = array('WHERE' => 'id_distrib="'.$id.'"','ORDER BY' => 'id_distrib ASC', 'LIMIT' => '1' ));
		return $res;
	}
	public function filmAdd($fields)
	{
		$res = Entity::create('film',$fields);
		return $res;
	}
	public function listGenre()
	{
		$res = Entity::find('genre');
		return $res;
	}
	public function listDistrib()
	{
		$res = Entity::find('distrib');
		return $res;
	}
	public function updateFilm($id,$fields)
	{
		$res = Entity::update('film',$id,$fields);
		return $res;
	}
	public function deleteFilm($id)
	{
		$res = Entity::delete('film',$id);
		return $res;
	}
	public function filmSearch($name)
	{
		$res = Entity::find('film', $params=array('WHERE' => 'titre','LIKE' => '"%'.$name.'%"','LIMIT' => '1'));
		return $res;
	}
}
?>