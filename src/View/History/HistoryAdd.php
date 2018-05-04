<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Ajouter un film à l'historique :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row">
					<form method="POST" action="add" id="formAddToHistory">
						<label for="autocomplete-input">Film :</label>
						@if (isset($titleFilm))
						<input value="{{$titleFilm}}" type="text" name="filmName" id="autocomplete-input" class="autocomplete inputAddHistory" autocomplete="off"/><br/>
						@else
						<input type="text" name="filmName" id="autocomplete-input" class="autocomplete inputAddHistory" autocomplete="off"/><br/>
						@endif
						<label class="labelStar" for="stars">Note :</label>		
						<div class="stars">
						    <input class="star star-10" id="star-10" type="radio" name="star" value="10" />
						    <label class="star star-10" for="star-10"></label>
						    <input class="star star-9" id="star-9" type="radio" name="star" value="9" />
						    <label class="star star-9" for="star-9"></label>
						    <input class="star star-8" id="star-8" type="radio" name="star" value="8" />
						    <label class="star star-8" for="star-8"></label>
						    <input class="star star-7" id="star-7" type="radio" name="star" value="7" />
						    <label class="star star-7" for="star-7"></label>
						    <input class="star star-6" id="star-6" type="radio" name="star" value="6" />
						    <label class="star star-6" for="star-6"></label>
						    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
						    <label class="star star-5" for="star-5"></label>
						    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
						    <label class="star star-4" for="star-4"></label>
						    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
						    <label class="star star-3" for="star-3"></label>
						    <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
						    <label class="star star-2" for="star-2"></label>
						    <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
						    <label class="star star-1" for="star-1"></label>
						</div>
						<input type="submit" class="btn waves-effect waves-light submitModifyFilm validFormAddHistory"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>