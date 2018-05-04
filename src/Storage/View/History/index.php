<button class="btn waves-effect waves-light backbtn" onclick="window.history.back();">Retour</button>
<div class="had-container">
	<div class="parallax-container logueo">
		<div class="row"><br>
			<div class="col m8 s8 offset-m2 offset-s2 center">
				<div class="truncate bg-card-user">
					<div class="row" id="helloStr">
						<p id="deleteFilm">Mon Historique :</p>
						<a href="<?= BASE_URI ?>\history\add"><button class="btn waves-effect waves-light tomato">Ajouer un film</button></a>
						<a href="<?= BASE_URI ?>\history\delete"><button class="btn waves-effect waves-light tomato">Supprimer un film</button></a>
					</div>
				</div>
			</div>
			<div class="col m2 s2"></div>
			<div class="col m6 s6 offset-m2 offset-s2 middle">
				<div class="row tableRow">
					<table class="highlight">
						<thead>
							<tr>
								<th>Film</th>
								<th class="ratingTh">Note<p>/10</p></th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($resInfo)){ ?>
							<?php for($i=0;$i<count($resInfo);$i++){ ?>
							<tr>
								<td class="th">
									<p><a href="<?= BASE_URI ?>\film\id\<?= htmlspecialchars($resInfo[$i][0]['id']) ?>" ><?= $resInfo[$i][0]['titre'] ?></a></p>
								</td>
								<td>
									<p><?= htmlspecialchars($rating[$i]) ?></p>
								</td>
								<td>
									<p><?= htmlspecialchars( $date[$i] ) ?></p>
								</td>
							</tr>
							<?php }} ?>
						</tbody>
					</table>		
				</div>
			</div>
		</div>
	</div>
</div>