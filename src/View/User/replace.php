<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Modifier mes coordonnées :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row">	
					<form method="POST" action="modify">
						<label for="nameModif">Nom :</label>
						<input type="text" name="nameModif" id="nameModif" value="{{$name}}" />
						<label for="lastNameModif">Prénom :</label>
						<input type="text" name="lastNameModif" id="lastNameModif" value="{{$lastName}}" />
						<label for="emailModif">Email :</label>
						<input type="email" name="emailModif" id="emailModif" value="{{$email}}" />
						<label for="passwordModif">Password :</label>
						<input type="password" name="passwordModif" id="passwordModif" value="" />
						<input type="submit" class="btn waves-effect waves-light submitModifyFilm"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>