<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<h4 id="allFIlmsTxt">Tous les Genres :</h4>
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
								<th>Nombre de films</th>
								<th class="actionTableth">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0; $i < count($tab[0]); $i++){ ?>
							<tr>
								<td class="th">
									<a href='genre/id/<?=$tab[1][$i]?>'><?= htmlspecialchars($tab[0][$i]) ?></a><br/>	
								</td>
								<td><?= htmlspecialchars($tab[2][$i]) ?></td>
								<td class="actionTable">
									<a href="genre/modify/id/<?= htmlspecialchars($tab[1][$i]) ?>" class="btn-floating btn-edit waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
									<a href="genre/delete/id/<?= htmlspecialchars($tab[1][$i]) ?>" class="btn-floating btn-delete btn-edit waves-effect waves-light"><i class="material-icons">delete</i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>		
				</div>
			</div>
		</div>
	</div>
</div>