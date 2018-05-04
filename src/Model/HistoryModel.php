<?php
namespace Model;
use \Core\Entity;
use \Controller\HistoryController;
class HistoryModel extends Entity
{
	public function filmExist($params)
	{
		$res = Entity::find('film',$params);
		return $res;
	}
	public function addHistory($fields)
	{
		$res = Entity::create('historique',$fields);
		return $res;
	}
	public function listHistory($params)
	{
		$res = Entity::find('historique', $params);
		return $res;
	}
	public function historyDelete($id)
	{
		$res = Entity::delete('historique',$id);
		return $res;
	}
}
?>