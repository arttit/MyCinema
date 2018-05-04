<?php
namespace Controller;
use \Core\Request;
use \Model\UserModel;
use \Model\ImgModel;
class UserController extends \Core\Controller
{
	public function index()
	{
		session_start();
		$_SESSION['idUser']='';
		session_destroy(); 
		header('location:'.BASE_URI.'\\');
	}
	public function register()
	{
		if(isset($_POST['emailRegister']) && isset($_POST['passwordRegister']) && $_POST['emailRegister']!='' && $_POST['passwordRegister']!='' && isset($_POST['prenomRegister']) && isset($_POST['nomRegister']) && $_POST['prenomRegister']!='' && $_POST['nomRegister']!=''){
			$Request = new Request;
			$newPost = $Request->__construct();
			$nom = $newPost[0];
			$prenom = $newPost[1];
			$email = $newPost[2];
			$password = hash_hmac('ripemd160',$newPost[3],'yolo');
			$UserModels = new \Model\UserModel;
			$res = $UserModels->save($email,$password,$nom,$prenom);
			if($res!='null'){
				?><script> alert('Inscription réussie !'); window.location = 'login'; </script><?php 
			}else{
				?><script> alert('Inscription impossible !'); </script><?php
			}
		}
	}
	public function login()
	{
		if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin']) && $_POST['emailLogin']!='' && $_POST['passwordLogin']!=''){
			session_start();
			$Request = new Request;
			$newPost = $Request->__construct();
			$email = $newPost[0];
			$password = hash_hmac('ripemd160',$newPost[1],'yolo');
			$UserModels = new \Model\UserModel;
			$loginRes = $UserModels->login($email,$password);	
			if(!empty($loginRes)){
				$_SESSION['idUser']=$loginRes[0]['id'];
				header('location:show');
			}else{
				?><script> alert('Email ou mot de passe incorrect !'); </script><?php
			}
			return $loginRes;
		}
	}
	public function show()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');return;}
		$UserModels = new \Model\UserModel;
		$showRes = $UserModels->show($id);	
		$random = $UserModels->random();
		$imdb = new ImgModel;
		$randomFilms = array();
		for($i=0;$i<count($random);$i++){
			$movieTitle = $imdb->getIMDbUrlFromBing($random[$i]['titre']);
			$explode = explode('/', $movieTitle);
			if(isset($explode[4]) && $explode[4]!=''){
				$movieInfos = $imdb->getMovieInfo($explode[4]);
				array_push($randomFilms, $movieInfos);
			}
			self::set('film'.($i+1),$random[$i]['titre']);
			self::set('idFilm'.($i+1),$random[$i]['id']);
			self::set('resumFilm'.($i+1),$random[$i]['resum']);
			if($random[$i]['annee_prod']==0){$random[$i]['annee_prod']='';}self::set('yearFilm'.($i+1),$random[$i]['annee_prod']);
			if(isset($randomFilms[$i]['poster'])){self::set('filmImg'.($i+1),$randomFilms[$i]['poster']);}
			if(isset($randomFilms[$i]['rating']) && $randomFilms[$i]['rating']!=''){
				$rating = explode(' ', $randomFilms[$i]['rating']);
				self::set('realRatingFilm'.($i+1),$rating[0]);
				self::set('nbRatingFilm'.($i+1),$rating[3]);
			}
		}
		self::set('LastName',$showRes[0]['prenom']);
	}
	public function replace()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		$infos = self::info(1);
		self::set('email',$infos[0]['email']);
		self::set('password',$infos[0]['password']);	
		self::set('name',$infos[0]['nom']);	
		self::set('lastName',$infos[0]['prenom']);	
		if(isset($_POST['emailModif']) && isset($_POST['passwordModif']) && $_POST['emailModif']!='' && $_POST['passwordModif']!='' && isset($_POST['lastNameModif']) && $_POST['lastNameModif']!='' && isset($_POST['nameModif']) && $_POST['nameModif']!=''){
			$Request = new Request;
			$replace = $Request->__construct();
			$email = $replace[2];
			$password = hash_hmac('ripemd160',$replace[3],'yolo');
			$name = $replace[0];
			$lastName = $replace[1];
			$UserModels = new \Model\UserModel;
			$fields = array("email" => $email,"password" => $password,'nom' => $name,'prenom' => $lastName);
			$replaceRes = $UserModels->replace($id,$fields);
			var_dump($replaceRes);
			if(isset($replaceRes) && $replaceRes == 'true'){
				header('location:'.BASE_URI.'\user\info');
			}else{
				?><script> alert('Erreur: impossible de modifier les coordonnées...'); </script><?php
			}	
				return $replaceRes;
		}
	}
	public function delete()
	{
		session_start();
		if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
			$id = $_SESSION['idUser'];
		}else{header('location:'.BASE_URI.'\\');}
		$UserModels = new \Model\UserModel;
		$deleteRes = $UserModels->remove($id);	
		header('location:'.BASE_URI.'\\');
	}
	public function info($who=null)
	{
		if($who != 1){
			session_start();
			if (isset($_SESSION['idUser']) && $_SESSION['idUser']!='') {
				$id = $_SESSION['idUser'];
			}else{header('location:'.BASE_URI.'\\');}
		}
		$id = $_SESSION['idUser'];
		$UserModels = new \Model\UserModel;
		$infos = $UserModels->show($id);
		if(isset($infos[0]) && !empty($infos[0])){
			self::set('email',$infos[0]['email']);
			self::set('password',$infos[0]['password']);	
			self::set('name',$infos[0]['nom']);	
			self::set('lastName',$infos[0]['prenom']);
			}	
		return $infos;
	}
}