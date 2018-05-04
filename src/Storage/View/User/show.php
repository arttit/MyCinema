<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="helloYou">Bonjour <?= htmlspecialchars($LastName) ?></h4>
						<h5 id="txtRandom">Voici quelques films qui pourraient vous intéresser :</h5>
					</div>
				</div>
			</div>
			<div class="row" id="allRandomFilms">
				<?php if(isset($film1) && isset($filmImg1) && isset($resumFilm1)): ?>				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg1?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4"><?= htmlspecialchars($film1) ?></p>
							<p><a href="<?= BASE_URI ?>\film\id\<?= htmlspecialchars($idFilm1) ?>">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4"><?= htmlspecialchars($film1) ?><i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum"><?= htmlspecialchars($resumFilm1) ?></p>
							<?php if(isset($realRatingFilm1)): ?>							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm1.' votes'?>"><?= htmlspecialchars($realRatingFilm1) ?> /10</p>
							<?php endif; ?>
							<p class="yearInfoCard"><?= htmlspecialchars($yearFilm1) ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?> 
				<?php if(isset($film2) && isset($filmImg2) && isset($resumFilm2)): ?>				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg2?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4"><?= htmlspecialchars($film2) ?></p>
							<p><a href="<?= BASE_URI ?>\film\id\<?= htmlspecialchars($idFilm2) ?>">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4"><?= htmlspecialchars($film2) ?><i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum"><?= htmlspecialchars($resumFilm2) ?></p>
							<?php if(isset($realRatingFilm2)): ?>							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm2.' votes'?>"><?= htmlspecialchars($realRatingFilm2) ?> /10</p>
							<?php endif; ?>
							<p class="yearInfoCard"><?= htmlspecialchars($yearFilm2) ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?> 
				<?php if(isset($film3) && isset($filmImg3) && isset($resumFilm3)): ?>				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg3?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4"><?= htmlspecialchars($film3) ?></p>
							<p><a href="<?= BASE_URI ?>\film\id\<?= htmlspecialchars($idFilm3) ?>">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4"><?= htmlspecialchars($film3) ?><i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum"><?= htmlspecialchars($resumFilm3) ?></p>
							<?php if(isset($realRatingFilm3)): ?>							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm3.' votes'?>"><?= htmlspecialchars($realRatingFilm3) ?> /10</p>
							<?php endif; ?>
							<p class="yearInfoCard"><?= htmlspecialchars($yearFilm3) ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?> 
				<?php if(isset($film4) && isset($filmImg4) && isset($resumFilm4)): ?>				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg4?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4"><?= htmlspecialchars($film4) ?></p>
							<p><a href="<?= BASE_URI ?>\film\id\<?= htmlspecialchars($idFilm4) ?>">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4"><?= htmlspecialchars($film4) ?><i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum"><?= htmlspecialchars($resumFilm4) ?></p>
							<?php if(isset($realRatingFilm1)): ?>							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm4.' votes'?>"><?= htmlspecialchars($realRatingFilm4) ?> /10</p>
							<?php endif; ?>
							<p class="yearInfoCard"><?= htmlspecialchars($yearFilm4) ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?>    
			</div>
		</div>
	</div>
</div>
</div>