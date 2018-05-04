<?php
namespace Model;
use \Core\Entity;
use \Controller\GenreController;
class GenreModel extends Entity
{
	public function listGenres()
	{
		$res = Entity::find('genre');
		return $res;
	}
	public function listAllFilmsByGenre($id,$limit)
	{
		$res = Entity::find('film', $params = array( 'WHERE' => 'id_genre="'.$id.'"', 'ORDER BY' => 'titre ASC', 'LIMIT' => $limit ));
		return $res;
	}
	public function genreAdd($fields)
	{
		$res = Entity::create('genre',$fields);
		return $res;
	}
	public function genreInfo($id)
	{
		$res = Entity::read('genre',$id);
		return $res;
	}
	public function updateGenre($id,$fields)
	{
		$res = Entity::update('genre',$id,$fields);
		return $res;
	}
	public function deleteGenre($id)
	{
		$res = Entity::delete('genre',$id);
		return $res;
	}
}
?>