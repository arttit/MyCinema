<!doctype html> 
<html lang="fr"> 
<head> 
	<meta charset="UTF-8" /> 
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" /> 
	<meta http-equiv="X-UA-Compatible" content="ie=edge" /> 
	<title>Pie PHP</title> 
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URI ?>\webroot\css\style.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URI ?>\webroot\css\materialize.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script src="<?= BASE_URI ?>\webroot\js\script.js"></script>
</head> 
<body> 
	<nav class="grey darken-4">
		<div class="nav-wrapper">
			<a href="<?= BASE_URI ?>\user\show" class="brand-logo center pulse">
				<div id="logoCircle">
					<img id="logoC" src="<?= BASE_URI ?>\webroot\assets\logo.png" alt="logo"/>
				</div>
			</a>
			<a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="<?= BASE_URI ?>\film\page\1" class="dropdown-buttonFilm" data-activates="dropdownFilm">Films<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a href="<?= BASE_URI ?>\genre" class="dropdown-buttonGenre" data-activates="dropdown1">Genres<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="HistoryLink" href="<?= BASE_URI ?>\history">Historique</a></li>
				<li><a href="<?= BASE_URI ?>\user\show" class="dropdown-buttonUser" data-activates="dropdownUser">Mon compte<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="<?= BASE_URI ?>\film\page\1">Films</a></li>
				<li><a href="<?= BASE_URI ?>\film\page\1" class="burger-li">- liste</a></li>
				<li><a href="<?= BASE_URI ?>\film\add" class="burger-li">- ajouter</a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\genre">Genres</a></li>
				<li><a href="<?= BASE_URI ?>\genre" class="burger-li">- liste</a></li>
				<li><a href="<?= BASE_URI ?>\genre\add" class="burger-li">- ajouter</a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\history">Historique</a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\user\show">Mon compte</a></li>
				<li><a href="<?= BASE_URI ?>\user\info" class="burger-li">- Coordonnées</a></li>
				<li><a href="<?= BASE_URI ?>\user" class="burger-li">- Déconnexion</a></li>
				<li class="divider"></li>
				<li><a onclick="window.history.back();">Retour</a></li>
			</ul>
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="<?= BASE_URI ?>\genre">liste</a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\genre\add">ajouter<i class="material-icons icon-plus">add</i></a></li>
			</ul>
			<ul id="dropdownFilm" class="dropdown-content">
				<li><a href="<?= BASE_URI ?>\film\page\1">liste</a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\film\add">ajouter<i class="material-icons icon-plus icon-film">add</i></a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\film\search" class="findLI">rechercher</a></li>
			</ul>
			<ul id="dropdownUser" class="dropdown-content">
				<li><a href="<?= BASE_URI ?>\user\info">Coordonnées</a></li>
				<li class="divider"></li>
				<li><a href="<?= BASE_URI ?>\user">Déconnexion</a></li>
			</ul>
		</div>
	</nav>
	<div class="preloadCircle">
		<div class="preloader-wrapper big ">
			<div class="spinner-layer spinner-blue">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
			<div class="spinner-layer spinner-red">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
			<div class="spinner-layer spinner-yellow">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
			<div class="spinner-layer spinner-green">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
	</div>
	<?php $view; ?>
</body> 
</html>