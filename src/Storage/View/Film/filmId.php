<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt" class="titleFilm"><?= htmlspecialchars($titre) ?> :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 left">
				<div class="row">
					<h5 class="bold">genre : </h5><p class="infoFilmP"><?= htmlspecialchars($genre) ?></p></br>
					<h5 class="bold">distributeur : </h5><p class="infoFilmP"><?= htmlspecialchars($distrib) ?></p></br>
					<h5 class="bold">resumé : </h5><p class="infoFilmP"><?= htmlspecialchars($resum) ?></p></br>
					<?php if(isset($director)): ?>					<h5 class="bold">réalisateur :</h5><p class="infoFilmP"><?= htmlspecialchars($director) ?></p></br>
					<?php endif; ?>
					<h5 class="bold">date début d'affiche : </h5><p class="infoFilmP"><?= htmlspecialchars($date_debut_affiche) ?></p></br>
					<h5 class="bold">date fin d'affiche : </h5><p class="infoFilmP"><?= htmlspecialchars($date_fin_affiche) ?></p></br>
					<h5 class="bold">durée du film : </h5><p class="infoFilmP tooltipped" data-position="right" data-delay="50" data-tooltip="<?=$time?>"><?= htmlspecialchars($duree_min) ?> minutes</p></br>
					<h5 class="bold">année de production : </h5><p class="infoFilmP"><?= htmlspecialchars($annee_prod) ?></p></br>
					<?php if(isset($nbRating)): ?>					<h5 class="bold">votes :</h5><p class="infoFilmP"><?= htmlspecialchars($nbRating) ?></p></br>
					<?php endif; ?>
					<?php if(isset($realRating)): ?>					<h5 class="bold">classement :</h5><p class="infoFilmP">
						<div class="allStars tooltipped" data-position="right" data-delay="50" data-tooltip="<?= htmlspecialchars($realRating) ?>">
							<?php for($i=0;$i<10;$i++){ ?>
							<?php if($i < $rating) : ?>							<i class="material-icons starGold">star</i><i class="material-icons starBorder">star_border</i>
							<?php else: ?>
							<i class="material-icons starBorder">star_border</i>
							<?php endif; ?>
							<?php } ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col m5 s5 offset-m2 offset-s2 right">
					<?php if(isset($poster)): ?>					<div id="imgPosterFilm">
						<div class="card FilmPosterCard z-depth-5">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="<?=$poster?>">
							</div>
							<div class="card-content FilmTxtCard FilmContentCardInfo">
								<p class="card-title activator grey-text text-darken-4"><?= htmlspecialchars($titre) ?></p>
							</div>
							<div class="card-reveal">
								<p class="card-title grey-text text-darken-4 FilmTxtCard"><?= htmlspecialchars($titre) ?><i class="material-icons right close-icon">close</i></p>
								<p class="card-reveal-resum"><?= htmlspecialchars($resum) ?></p>
								<?php if(isset($realRating)): ?>								<p class="ratingCard"><?= htmlspecialchars($realRating) ?> /10</p>
								<?php endif; ?>
								<?php if(isset($annee_prod)): ?>								<p class="yearInfoCard FilmYearCard"><?= htmlspecialchars($annee_prod) ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="col m8 s8 offset-m2 offset-s2 center">
					<div class="fixed-action-btn horizontal">
						<a class="btn-floating btn-large red btn-edit-direct"><i class="material-icons mini-nav-icon">more_horiz</i></a>
						<ul class="mini-nav-btn">
							<li class="li-mini-nav-btn"><a href="<?= BASE_URI ?>\film\delete\id\<?= htmlspecialchars($id) ?>" class="btn-floating btn-delete btn-film btn-edit waves-effect waves-light btn-edit-direct tooltipped" data-position="top" data-delay="50" data-tooltip="Supprimer"><i class="material-icons big-icons">delete</i></a></li>
							<li class="li-mini-nav-btn"><a href="<?= BASE_URI ?>\film\modify\id\<?= htmlspecialchars($id) ?>" class="btn-floating btn-edit btn-film waves-effect waves-light tomato btn-edit-direct tooltipped" data-position="top" data-delay="50" data-tooltip="Modifier"><i class="material-icons big-icons">mode_edit</i></a></li>
							<li class="li-mini-nav-btn"><a href="<?= BASE_URI ?>\history\add" id="nameFilmAddHistory" class="btn-floating btn-edit btn-film waves-effect btn-edit-direct waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Ajouter à l'historique"><i class="material-icons addIcon">add</i></a></li>
						</ul>
					</div>
				</div>
				<form id="formNameFilmAddHistory" method="POST" action="<?= BASE_URI ?>\history\add">
					<input type="hidden" name="nameFilm" id="nameFilm" value="<?= htmlspecialchars($titre) ?>"/>
				</form>
			</div>
		</div>
	</div> 