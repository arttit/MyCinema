<?php 
namespace Controller;
use \Model\GenreModel;
class GenreController extends \Core\Controller
{
	public function index()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		$listGenres = new GenreModel;
		$resAllGenres = $listGenres->listGenres();
		$tab[0] = array();
		$tab[1] = array();
		$tab[2] = array();
		for($i = 0; $i<count($resAllGenres);$i++) {
			array_push($tab[0], $resAllGenres[$i]['nom']);
			array_push($tab[1], $resAllGenres[$i]['id']);
			$test = self::genreId($resAllGenres[$i]['id']);
			array_push($tab[2],count($test[0]));
		}
		self::set('tab',$tab);
		return $tab;
	}
	public function genreId($id=null)
	{
		if(!isset($id)){
			$http= $_SERVER['REQUEST_URI'];
			if(isset($_POST['inputPaginateGenre']) && $_POST['inputPaginateGenre']!=0){
				$actualPage = $_POST['inputPaginateGenre'];
			}else{
				$actualPage = 1;
			}
			$explode = explode('/', $http);
			for($i=1; $i<1032;$i++){
				if($i==1){
					$str=0;
					$stp=14;
				}
				if($actualPage==$i){
					$start = $str;
				}
				$str+=14;
			}
			$stop=14;
			$limit = $start.','.$stop;
		}
		$allFilms = new GenreModel;
		if(isset($id)){
			$limit = '';
			$resAll = $allFilms->listAllFilmsByGenre($id,$limit);
		}else{
			$resAll = $allFilms->listAllFilmsByGenre($explode[4],$limit);
			$infoGenre = $allFilms->genreInfo($explode[4]);
			self::set('genreName',$infoGenre[0]['nom']);
		}
		$tab[0] = array();
		$tab[1] = array();
		$tab[2] = array();
		for($i = 0; $i<count($resAll);$i++) {
			array_push($tab[0], $resAll[$i]['titre']);
			array_push($tab[1], $resAll[$i]['id']);
			array_push($tab[2], $resAll[$i]['annee_prod']);
		}
		self::set('tab',$tab);
		return $tab;
	}
	public function genreAdd()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		if(isset($_POST['genreName']) && $_POST['genreName']!=''){
			$fields = array('nom' => $_POST['genreName']);
			$model = new GenreModel;
			$res = $model->genreAdd($fields);
			if(isset($res) && $res !=''){
				header('location:'.BASE_URI.'\genre');
			}else{
				?><script> alert('Erreur: impossible d\'ajouté le genre ...'); </script><?php
			}
			return $res;
		}
	}
	public function genreModify()
	{
		session_start();
		$id = $_SESSION['idUser'];
		$http= $_SERVER['REQUEST_URI'];
		$explode = explode('/', $http);
		$model = new GenreModel;
		$res = $model->genreInfo($explode[5]);
		self::set('name',$res[0]['nom']);
		self::Set('id',$res[0]['id']);
		if(isset($_POST['modifGenre']) && $_POST['modifGenre']!=''){
			$id=$explode[5];
			$fields = array('nom' => $_POST['modifGenre']);
			$res = $model->updateGenre($id,$fields);
			var_dump($res);
			if(isset($res) && $res=='true'){
				header('location:'.BASE_URI.'\genre');
			}else{
				?><script> alert('Erreur: impossible de modifier le genre ...'); </script><?php
			}
			return $res;
		}
	}
	public function genreDelete()
	{
		session_start();
		$id = $_SESSION['idUser'];
		$http= $_SERVER['REQUEST_URI'];
		$explode = explode('/', $http);
		if($explode[5]===''){header('location:'.BASE_URI.'\genre');}
		$model = new GenreModel;
		$res = $model->genreInfo($explode[5]);
		self::set('name',$res[0]['nom']);
		if(isset($_POST['verifDeleteGenre']) && $_POST['verifDeleteGenre']==='yes'){
			$res = $model->deleteGenre($explode[5]);
			var_dump($res);
			if(isset($res) && $res=='true'){
				header('location:'.BASE_URI.'\genre');
			}else{
				?><script> alert('Erreur: impossible de supprimer le genre ...'); </script><?php
			}
			return $res;
		}
	}
}
?>