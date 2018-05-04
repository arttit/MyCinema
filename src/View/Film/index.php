<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Tous les Films :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m8 s8 offset-m2 offset-s2 border">
				<div class="row tableRow">
					<table class="highlight">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Genre</th>
								<th>Année</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0; $i < count($tab[0]); $i++){ ?>
							<tr>
								<td class="th">
									<a href='<?= BASE_URI ?>\film\id\<?=$tab[1][$i]?>'>{{$tab[0][$i]}}</a><br/>
								</td>
								<td class="th"><a href='<?= BASE_URI ?>\genre\id\<?=$tab[4][$i]?>'>{{$tab[2][$i][0]['nom']}}</a></td>
								<td>{{$tab[3][$i]}}</td>
								<td class="actionFIlmTable">
									<a href="<?= BASE_URI ?>\film\modify\id\{{$tab[1][$i]}}" class="btn-floating btn-edit btn-film waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
									<a href="<?= BASE_URI ?>\film\delete\id\{{$tab[1][$i]}}" class="btn-floating btn-delete btn-film btn-edit waves-effect waves-light"><i class="material-icons">delete</i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>		
				</div>
			</div>
			<div class="col m8 s8 offset-m2 offset-s2 center paginationdiv">
				<ul class="pagination">
					<li id="backPage" class=""><a href="#!"><i class="material-icons">chevron_left</i></a></li>
					<li id="1" class="waves-effect"><a id="1a" href="1">1</a></li>
					<li id="2" class="waves-effect"><a id="2a" href="2">2</a></li>
					<li id="3" class="waves-effect"><a id="3a" href="3">3</a></li>
					<li id="4" class="waves-effect"><a id="4a" href="4">4</a></li>
					<li id="5" class="waves-effect"><a id="5a" href="5">5</a></li>
					<li id="nextPage" class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
