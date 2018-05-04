<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Ajouter un film :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row">
					<form class="formAddFilm" method="POST" action="add">
						<label for="titleFilm">Title :</label>
						<input class="titleFilmAddJS" type="text" name="titleFilm" id="titleFilm" required="" />
						<label for="resumFilm">Resum :</label>
						<input type="text" name="resumFilm" id="resumFilm" required="" />
						<label for="selectGenre">Genre :</label>
						<select id="selectGenre" name="selectGenre">
							<option disabled selected>Sélectionner un genre</option>
							<?php for($i=0; $i<count($tabGenre); $i++){
								echo '<option value="'.$tabGenre[$i]['id'].'">'.$tabGenre[$i]['nom'].'</option>';
							} ?>
						</select>
						<label for="selectDistrib">Distributeur :</label>
						<select id="selectDistrib" name="selectDistrib">
							<option disabled selected>Sélectionner un distributeur</option>
							<?php for($i=0; $i<count($tabDistrib); $i++){
								echo '<option value="'.$tabDistrib[$i]['id_distrib'].'">'.$tabDistrib[$i]['nom'].'</option>';
							} ?>
						</select><br/>
						<label for="dateStart">Date debut affiche :</label>
						<input type="date" class="datepicker" name="dateStart" id="dateStart" />
						<label for="dateEnd">Date fin affiche :</label>
						<input type="date" class="datepicker" name="dateEnd" id="dateEnd" />	
						<label for="dureeFilm">Durée du film :</label>
						<p class="range-field tooltipped toolDuree" data-position="right" data-delay="50" data-tooltip="60">
							<input type="range" name="dureeFilm" id="dureeFilm" min="30" max="300" value="60" />
						</p>
						<label for="anneeProd">Année de prod :</label>
						<p class="range-field tooltipped toolAnnee" data-position="right" data-delay="50" data-tooltip="1950">
							<input type="range" name="anneeProd" id="anneeProd"  min="1900" max="2018" value="1950" />	
						</p>	
						<input type="submit" class="btn waves-effect waves-light submitModifyFilm"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>