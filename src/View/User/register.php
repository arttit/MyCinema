<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row login">
						<h4 id="registerTxt">Inscription :</h4>
						<form class="col s12" method="POST" action="add">
							<div class="row">
								<div class="col m3 s3"></div>
								<div class="input-field col m6 s6">
									<i class="material-icons iconis prefix">account_box</i>
									<input id="nomRegister" name="nomRegister" type="text" class="validate">
									<label for="nomRegister">Nom</label>
								</div>
							</div>
							<div class="row">
								<div class="col m3 s3"></div>
								<div class="input-field col m6 s6">
									<i class="material-icons iconis prefix">account_box</i>
									<input id="prenomRegister" name="prenomRegister" type="text" class="validate">
									<label for="prenomRegister">Prénom</label>
								</div>
							</div>
							<div class="row">
								<div class="col m3 s3"></div>
								<div class="input-field col m6 s6">
									<i class="material-icons iconis prefix">email</i>
									<input id="emailRegister" name="emailRegister" type="email" class="validate">
									<label for="emailRegister">Email</label>
								</div>
							</div>
							<div class="row">
								<div class="col m3 s3"></div>
								<div class="input-field col m6 s6">
									<i class="material-icons iconis prefix">enhanced_encryption</i>
									<input id="passwordRegister" type="password" name="passwordRegister" class="validate">
									<label for="passwordRegister">Password</label>
								</div>
							</div>
							<div class="row">
								<button class="btn waves-effect waves-light loginbtn" type="submit">Valider</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
