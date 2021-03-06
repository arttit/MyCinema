<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="helloYou">Bonjour {{$LastName}}</h4>
						<h5 id="txtRandom">Voici quelques films qui pourraient vous intéresser :</h5>
					</div>
				</div>
			</div>
			<div class="row" id="allRandomFilms">
				@if (isset($film1) && isset($filmImg1) && isset($resumFilm1))
				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg1?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4">{{$film1}}</p>
							<p><a href="<?= BASE_URI ?>\film\id\{{$idFilm1}}">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4">{{$film1}}<i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum">{{$resumFilm1}}</p>
							@if (isset($realRatingFilm1))
							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm1.' votes'?>">{{$realRatingFilm1}} /10</p>
							@endif
							<p class="yearInfoCard">{{$yearFilm1}}</p>
						</div>
					</div>
				</div>
				@endif 
				@if (isset($film2) && isset($filmImg2) && isset($resumFilm2))
				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg2?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4">{{$film2}}</p>
							<p><a href="<?= BASE_URI ?>\film\id\{{$idFilm2}}">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4">{{$film2}}<i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum">{{$resumFilm2}}</p>
							@if (isset($realRatingFilm2))
							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm2.' votes'?>">{{$realRatingFilm2}} /10</p>
							@endif
							<p class="yearInfoCard">{{$yearFilm2}}</p>
						</div>
					</div>
				</div>
				@endif 
				@if (isset($film3) && isset($filmImg3) && isset($resumFilm3))
				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg3?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4">{{$film3}}</p>
							<p><a href="<?= BASE_URI ?>\film\id\{{$idFilm3}}">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4">{{$film3}}<i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum">{{$resumFilm3}}</p>
							@if (isset($realRatingFilm3))
							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm3.' votes'?>">{{$realRatingFilm3}} /10</p>
							@endif
							<p class="yearInfoCard">{{$yearFilm3}}</p>
						</div>
					</div>
				</div>
				@endif 
				@if (isset($film4) && isset($filmImg4) && isset($resumFilm4))
				<div class="filmRandomImg">
					<div class="card z-depth-5">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="<?=$filmImg4?>">
						</div>
						<div class="card-content">
							<p class="card-title activator grey-text text-darken-4">{{$film4}}</p>
							<p><a href="<?= BASE_URI ?>\film\id\{{$idFilm4}}">Plus d'infos</a></p>
						</div>
						<div class="card-reveal">
							<p class="card-title grey-text text-darken-4">{{$film4}}<i class="material-icons right close-icon">close</i></p>
							<p class="card-reveal-resum">{{$resumFilm4}}</p>
							@if (isset($realRatingFilm1))
							<p class="ratingCardShow tooltipped" data-position="top" data-delay="50" data-tooltip="<?=$nbRatingFilm4.' votes'?>">{{$realRatingFilm4}} /10</p>
							@endif
							<p class="yearInfoCard">{{$yearFilm4}}</p>
						</div>
					</div>
				</div>
				@endif    
			</div>
		</div>
	</div>
</div>
</div>