<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Tous les films du genre <?= htmlspecialchars($genreName) ?> :</h4>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m8 s8 offset-m2 offset-s2 border center tableGenre">
				<div class="row tableRow">
					<table class="highlight">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Année</th>
								<th class="actionTableth">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0; $i < count($tab[0]); $i++){ ?>
							<tr>
								<td class="th">
									<a href='<?= BASE_URI ?>\film\id\<?=$tab[1][$i]?>'><?= htmlspecialchars($tab[0][$i]) ?></a><br/>	
								</td>
								<td><?= htmlspecialchars($tab[2][$i]) ?></td>
								<td class="actionTable">
									<a href="<?= BASE_URI ?>\film\modify\id\<?= htmlspecialchars($tab[1][$i]) ?>" class="btn-floating btn-edit waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
									<a href="<?= BASE_URI ?>\film\delete\id\<?= htmlspecialchars($tab[1][$i]) ?>" class="btn-floating btn-delete btn-edit waves-effect waves-light"><i class="material-icons">delete</i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>		
				</div>
			</div>
			<div class="col m8 s8 offset-m2 offset-s2 center paginationdiv">
				<ul class="pagination">
					<li id="backPage" class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
					<li id="1" class="waves-effect liGenrePaginate"><a id="1a" class="">1</a></li>
					<li id="2" class="waves-effect liGenrePaginate"><a id="2a" class="">2</a></li>
					<li id="3" class="waves-effect liGenrePaginate"><a id="3a" class="">3</a></li>
					<li id="4" class="waves-effect liGenrePaginate"><a id="4a" class="">4</a></li>
					<li id="5" class="waves-effect liGenrePaginate"><a id="5a" class="">5</a></li>
					<li id="nextPage" class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
				</ul>
			</div>
			<form id="formPaginateGenre" method="POST">
				<input type="hidden" name="inputPaginateGenre" id="inputPaginateGenre" value="" />
			</form>
		</div>
	</div>
</div>