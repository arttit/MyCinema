<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<p id="deleteFilm">Voulez vous vraiment supprimer le genre :{{ $name }} ?</p>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row">
					<form method="POST" action="">
						<div class="inputFormDelete">
							<label class="labelInputDelete" for="verifDeleteGenre">Oui</label>
							<input type="checkbox" name="verifDeleteGenre" id="verifDeleteGenre" value="yes" /><br/>
							<label class="labelInputDelete" for="verifNODeleteGenre">Non</label>
							<input type="checkbox" name="verifNODeleteGenre" id="verifNODeleteGenre"/>
						</div>
						<input type="submit" class="btn waves-effect waves-light submitModifyFilm"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

