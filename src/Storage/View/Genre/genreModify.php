<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Modifier le genre <?= htmlspecialchars($name) ?> :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row">
					<form method="POST" action="">
						<label for="modifGenre">Nom :</label>
						<input type="text" name="modifGenre" id="modifGenre" value="<?= htmlspecialchars( $name ) ?>"/>
						<input type="hidden" name="idGenre" value="<?= htmlspecialchars( $id ) ?>"/>
						<input type="submit" class="btn waves-effect waves-light submitModifyFilm" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>