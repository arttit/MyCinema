<?php 
namespace Controller;
use \Model\HistoryModel;
use \Model\FilmModel;
class HistoryController extends \Core\Controller
{
	public function index()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		$model = new HistoryModel;
		$params = array('WHERE' => 'id_membre='.$id.'', 'ORDER BY' => 'date ASC', 'LIMIT' => '');
		$res = $model->listHistory($params);
		$modelinfo = new FilmModel;
		for($i=0;$i<count($res);$i++){
			$resInfo[$i] = $modelinfo->filmInfo($res[$i]['id_film']);
			$date[$i]= $res[$i]['date'];
			$rating[$i]= $res[$i]['note'];
		}
		if(!empty($res)){
			self::set('date',$date);
			self::set('resInfo',$resInfo);
			self::set('rating',$rating);
		}
	}
	public function historyAdd()
	{
		session_start();
		$idUser = $_SESSION['idUser'];
		if(isset($_POST['nameFilm']) && $_POST['nameFilm']!=''){self::set('titleFilm',$_POST['nameFilm']);}
		if(isset($_POST['filmName']) && $_POST['filmName']!=''){
			$model = new HistoryModel;
			$name = $_POST['filmName'];
			$params = array('WHERE' => 'titre', 'LIKE' => '"%'.$name.'%"', 'LIMIT' => '1');
			$res = $model->filmExist($params);
			if(!empty($res)){
				$idFilm = $res[0]['id'];
				$date = date('Y-m-d H:i:s');
				if(isset($_POST['star'])){ $fields = array('id_membre' => $idUser, 'id_film' => $idFilm, 'date' => $date,'note' => $_POST['star']);}else{
				$fields = array('id_membre' => $idUser, 'id_film' => $idFilm, 'date' => $date,'note'=>'0');}
				$res = $model->addHistory($fields);
				if(isset($res) && $res!=''){
					?><script> alert('Film ajouté à l\'historique !'); </script><?php
				}
				return $res;
			}else{
				?><script> alert('Ce film n\'existe pas...'); </script><?php
			}
		}
	}
	public function historyDelete()
	{
		session_start();
		$id = $_SESSION['idUser'];
		$model = new HistoryModel;
		$params = array('WHERE' => 'id_membre='.$id.'', 'ORDER BY' => 'date ASC', 'LIMIT' => '');
		$res = $model->listHistory($params);
		$modelinfo = new FilmModel;
		for($i=0;$i<count($res);$i++){
			$resInfo[$i] = $modelinfo->filmInfo($res[$i]['id_film']);
		}
		self::set('resInfo',$resInfo);
		if(isset($_POST['deleteHistory']) && $_POST['deleteHistory']!=''){
			$res = $model->historyDelete($_POST['deleteHistory']);
			if($res == 'true'){
				header('location:'.BASE_URI.'\history\delete');
			}else{
				?><script> alert('Erreur : impossible de supprimer le film de l\'historique...'); </script><?php
			}
			return $res;
		}
	}
}
?>