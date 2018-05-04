<?php
namespace Controller;
use \Model\FilmModel;
use \Core\Request;
use \Model\ImgModel;
class FilmController extends \Core\Controller
{
	public function index()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		$listFilms = new FilmModel;
		$http= $_SERVER['REQUEST_URI'];
		$explode = explode('/', $http);
		for($i=1; $i<3683;$i++){
			if($i==1){
				$str=0;
				$stp=14;
			}
			if($explode[4]==$i){
				$start = $str;
			}
			$str+=14;
		}
		$stop=14;
		$limit = $start.','.$stop;
		$res = $listFilms->listFilms($params=array('WHERE' => 'id!=0','ORDER BY' => 'id ASC', 'LIMIT' => $limit));
		$tab[0] = array();
		$tab[1] = array();
		$tab[2] = array();
		$tab[3] = array();
		$tab[4] = array();
		for($i = 0; $i<count($res);$i++) {
			array_push($tab[0], $res[$i]['titre']);
			array_push($tab[1], $res[$i]['id']);
			$genre = $listFilms->FilmGenre($res[$i]['id_genre']);
			array_push($tab[2], $genre);
			array_push($tab[3], $res[$i]['annee_prod']);
			array_push($tab[4], $res[$i]['id_genre']);
		}
		self::set('tab',$tab);
		return $tab;
	}
	public function filmId()
	{
		session_start();
		$id = $_SESSION['idUser'];
		$http= $_SERVER['REQUEST_URI'];
		$explode = explode('/', $http);
		$filmInfo = new FilmModel;
		$res = $filmInfo->FilmInfo($explode[4]);
		$resGenre = $filmInfo->FilmGenre($res[0]['id_genre']);
		$resDistrib = $filmInfo->FilmDistrib($res[0]['id_distrib']);
		$imdb = new ImgModel;
		$movieTitle = $imdb->getIMDbUrlFromBing($res[0]['titre']);
		$explode = explode('/', $movieTitle);
		if(isset($explode[4]) && $explode !=''){$movieInfos = $imdb->getMovieInfo($explode[4]);}
		if(isset($movieInfos['poster']) && $movieInfos['poster']!=''){self::set('poster',$movieInfos['poster']);}
		if(isset($movieInfos['rating']) && $movieInfos['rating']!=''){
			$rating = explode(' ', $movieInfos['rating']);
			self::set('realRating',$rating[0]);
			self::set('rating',round($rating[0]));
			self::set('nbRating',$rating[3]);
		}
		$hours = $res[0]['duree_min'];
		$time = strftime( "%H H %M min", $hours * 60 );
		if(isset($movieInfos['director'])){
			self::set('director',$movieInfos['director']);
		}
		self::set('time',$time);
		self::set('genre',  ucfirst($resGenre[0]['nom']));
		self::set('distrib', ucfirst($resDistrib[0]['nom']));
		self::set('titre', $res[0]['titre']);
		self::set('id', $res[0]['id']);
		self::set('resum', $res[0]['resum']);
		self::set('date_debut_affiche', $res[0]['date_debut_affiche']);
		self::set('date_fin_affiche', $res[0]['date_fin_affiche']);
		self::set('duree_min', $res[0]['duree_min']);
		self::set('annee_prod', $res[0]['annee_prod']);
		return $res;
	}
	public function filmAdd()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		$model = new filmModel;
		$resGenre= $model->listGenre();
		self::set('tabGenre',$resGenre);
		$resDistrib= $model->listDistrib();
		self::set('tabDistrib',$resDistrib);
		if(isset($_POST['titleFilm']) && isset($_POST['resumFilm']) && $_POST['titleFilm']!='' && $_POST['resumFilm']!=''){
			$Request = new Request;
			$newPost = $Request->__construct();
			if(isset($newPost[0])){$title = $newPost[0];}
			if(isset($newPost[1])){$resum = $newPost[1];}
			if(isset($newPost[2])){$genre = $newPost[2];}
			if(isset($newPost[3])){$distrib = $newPost[3];}
			if(isset($newPost[4])){$dateSart = $newPost[4];}
			if(isset($newPost[5])){$dateEnd = $newPost[5];}
			if(isset($newPost[6])){$duree = $newPost[6];}
			if(isset($newPost[7])){$anneeProd = $newPost[7];}
			$model = new filmModel;
			$resum = preg_replace("/'/", "\'", $resum);
			if(isset($title) && isset($resum) && isset($genre) && isset($distrib) && isset($dateSart) && isset($dateEnd) && isset($duree) && isset($anneeProd) ){
				$fields = array('id_genre' => $genre,'id_distrib' => $distrib, "titre" => $title, "resum" => $resum, 'date_debut_affiche' => $dateSart, 'date_fin_affiche' => $dateEnd, 'duree_min' => $duree, 'annee_prod' => $anneeProd);
				$res = $model->filmAdd($fields);
			}
			if(isset($res) && $res != ''){
				?><script> alert('Le film à bien été ajouté !');</script><?php
			}else{
				?><script> alert('Erreur: impossible d\'ajouté le film ...');</script><?php
			}
		}
	}
	public function filmModify()
	{
		session_start();	
		$id = $_SESSION['idUser'];
		$model = new filmModel;
		$resGenre= $model->listGenre();
		self::set('tabGenre',$resGenre);
		$resDistrib= $model->listDistrib();
		self::set('tabDistrib',$resDistrib);
		$http= $_SERVER['REQUEST_URI'];
		$explode = explode('/', $http);
		$filmInfo = new FilmModel;
		$res = $filmInfo->FilmInfo($explode[5]);
		$resGenre = $filmInfo->FilmGenre($res[0]['id_genre']);
		$resDistrib = $filmInfo->FilmDistrib($res[0]['id_distrib']);
		self::set('genre', $resGenre[0]['nom']);
		self::set('id_genre',  $resGenre[0]['id']);
		self::set('distrib',  $resDistrib[0]['nom']);
		self::set('id_distrib', $resDistrib[0]['id_distrib']);
		self::set('titre', $res[0]['titre']);
		self::set('resum', $res[0]['resum']);
		self::set('date_debut_affiche', $res[0]['date_debut_affiche']);
		self::set('date_fin_affiche', $res[0]['date_fin_affiche']);
		self::set('duree_min', $res[0]['duree_min']);
		self::set('annee_prod', $res[0]['annee_prod']);
		if(isset($_POST['titleFilm'])){
			if($_POST['titleFilm']!='' && $_POST['resumFilm']!='' && $_POST['selectGenre']!='' && $_POST['selectDistrib']!='' && $_POST['dateStart']!='' && $_POST['dateEnd']!='' && $_POST['dureeFilm']!='' && $_POST['anneeProd']!=''){
				$id = $explode[5];
				$fields = array('id_genre' => $_POST['selectGenre'],'id_distrib' => $_POST['selectDistrib'], 'titre' => $_POST['titleFilm'], 'resum' => $_POST['resumFilm'], 'date_debut_affiche' => $_POST['dateStart'], 'date_fin_affiche' => $_POST['dateEnd'], 'duree_min' => $_POST['dureeFilm'], 'annee_prod' => $_POST['anneeProd']);
				$res = $model->updateFilm($id,$fields);
				if(isset($res) && $res == 'true'){
					header('location:'.BASE_URI.'\film\modify\id\\'.$explode[5]);
				}else{
					?><script> alert('Erreur: impossible de modifié le film ...');</script><?php
				}
				return $res;
			}
		}
	}
	public function filmDelete()
	{
		session_start();
		$id = $_SESSION['idUser'];
		$http= $_SERVER['REQUEST_URI'];
		$explode = explode('/', $http);
		$id = $explode[5];
		$filmInfo = new FilmModel;
		$res = $filmInfo->FilmInfo($id);
		self::set('titre', $res[0]['titre']);
		if(isset($_POST['verifDelete']) && $_POST['verifDelete']!=''){
			$res = $filmInfo->deleteFilm($id);
			if(isset($res) && $res == 'true'){
				header('location:'.BASE_URI.'\film\page\1');
			}else{
				?><script> alert('Erreur: impossible de supprimer le film ...');</script><?php
			}
		return $res;
		}
	}
	public function filmSearch()
	{
		if(isset($_POST['filmName']) && $_POST['filmName']!='')
		{
			$filmSearch = new FilmModel;
			$res = $filmSearch->filmSearch($_POST['filmName']);
			if(isset($res) && !empty($res[0]) && $res[0]['id']!='')
			{
				header('location:'.BASE_URI.'\film\id\\'.$res[0]['id']);
			}
			return $res;
		}
	}
}
?>