<?php ob_start(); ?>
<!-- A propos-->
	<section id="about">
			<h2 class="heading-sub-title accent-color">À Propos</h2>
			<h3 class="heading-title">Écrivain dans l'âme</h3><br>
			<div class="textabout">
				<p>Jean Forteroche, né le 06 Août 1970 à Lyon, est un écrivain Français.</p><br>
				<p>Jean Forteroche publie son premier livre, intitulé "Un voyage en Russie", en 1997. Il a obtenu le prix des libraires avec ce roman. Connu, dans le monde entier.</p><br>
				<p>Actuellement, Jean Forteroche travaille sur son prochain roman, "Billet simple pour l'Alaska" et le publie par épisode en ligne sur ce site.</p><br>
			</div>
			<div class="row justify-content-center align-items-center pt-4"></div>
	</section><!-- Présentation Livre-->
	<section id="pres">
			<div class="row justify-content-center align-items-center pt-4">
				<div class="col-sm-6"><img alt="Photo de Jean Forteroche" class="img-fluid" src="public/images/livre.png"></div>
				<div class="col-sm-6 mt-4">
				<div class="textabout">

					<h3>Venez découvrir son nouveau livre</h3><br>
					<p>Jack Larfild avait tout juste 2 ans quand sa mère a quitté l’Alaska, fuyant la vie trop rude, et laissant derrière elle le père de Peter.</p>
					<p>Jack à aujourd’hui 24 ans et mène une vie bien remplie à Toronto. Lorsqu’il apprend que les jours de son père, très malade, sont peut-être comptés, il entreprend le voyage jusqu’à son village natal. Il va alors découvrir le quotidien « à la dure » , les journées qui comptent peu d’heures de clarté, les nuits à la belle étoile…</p>
					<p>Il va en profiter pour mieux connaître son père, à qui il tient beaucoup malgré les erreurs qu’il a commises.</p>
					</div>
					<br>
					<a class="btn-card" href="index.php?action=displayChap&id=25">Lire le livre</a>
				</div>
			</div>
	</section>
	<!--Derniers chapitres-->
	<section>
		<hr>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 text-center">
				<h2><span class="ion-minus"></span>Les chapitres<span class="ion-minus"></span></h2>
				<p>Venez découvrir "Un Billet simple pour l'alaska" et plongez vous dans une histoire incroyable.</p><br>
			</div>
		</div>
		<div class="row">
			<?php foreach($displayarticles as $displayarticle):  ?>
				<div class="col-md-4">
					<div class="card-content">
						<div class="card-img">
							<img alt="" src="public/miniatures/<?= $displayarticle['id'] ?>.png">
						</div>
						<div class="card-desc">
							<h3><?= $displayarticle['name'] ?></h3>
							<br>
							<a class="btn-card" href="index.php?action=displayChap&id=<?= $displayarticle['id'] ?>">Lire le chapitre</a>
						</div>
					</div>
				</div>
				<br>
			<?php endforeach; ?>
			</div>
	</section>


	<?php $content = ob_get_clean(); ?>
	<?php require('views/templatehome.php'); ?>