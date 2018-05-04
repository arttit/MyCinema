<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Mes coordonnées :</h4>
						<a href="<?= BASE_URI ?>\user\modify"><button class="btn waves-effect waves-light tomato">Modifier mes coordonnées</button></a>
						<a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Action irréversible" href="<?= BASE_URI ?>\user\delete"><button class="btn waves-effect waves-light tomato"><i class="material-icons">report_problem</i> Supprimer mon profil <i class="material-icons">report_problem</i></button></a>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row infosUserRow">
					<h5 class="bold">Nom : </h5><p class="infoFilmP"><?= htmlspecialchars($name) ?></p></br>
					<h5 class="bold">Prénom : </h5><p class="infoFilmP"><?= htmlspecialchars($lastName) ?></p></br>
					<h5 class="bold">Email : </h5><p class="infoFilmP"><?= htmlspecialchars($email) ?></p></br>
					<h5 class="bold">Mot de passe : </h5><p class="infoFilmP">******</p></br>
				</div>
			</div>
		</div>
	</div>
</div>