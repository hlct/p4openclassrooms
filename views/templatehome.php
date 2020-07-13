<?php
/*Si le status de la session = phpsession non ( pas de session) alors démarre une session*/
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Projet 4</title><!-- Bootstrap Core CSS -->
	<link href="public/css/bootstrap.css" rel="stylesheet"><!-- Custom CSS -->
	<link href="public/css/app.css" rel="stylesheet"><!-- Custom CSS -->
    <html>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<!-- Logo and responsive toggle -->
			<div class="navbar-header">
				<button class="navbar-toggle" data-target="#navbar" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button><?php echo "<a class='navbar-brand' href='index.php?action=accueil'>Jean Forteroche</a>" ?>
			</div><!-- Navbar links -->
			<div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
				<li class="dropdown">
					<a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Chapitres<span class="caret"></span></a>
						<ul aria-labelledby="about-us" class="dropdown-menu">
							<li>
							<ul>
							<?php foreach($homechapters as $homechapter):  ?>
								<li>
									<?php echo "<a href='index.php?action=displayChap&id=".$homechapter['id']."'>".$homechapter['name']."</a>" ?>
								</li>
							<?php endforeach;?>
							</ul>
						</ul>
					</li>
                <?php if (isset($_SESSION['auth'])): ?>
                    <li><?php echo "<a class='navbar-brand' href='index.php?action=displayadmin'>Tableau de bord</a>"?></li>
                    <li><?php echo "<a class='navbar-brand' href='index.php?action=logout'>Se déconnecter</a>"?></li>
                <?php else: ?>  
					<?php echo "<a class='navbar-brand' href='index.php?action=displaylogin'>Se connecter</a>" ?>
                <?php endif; ?>
            </ul>
			</div>
		</div>
	</nav>

	


<div class="container">
	<section 
		class="banner-section">
	</section>
	<!-- Bannière -->
	<section class="post-content-section">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
					<h1 class="text-center">Jean Forteroche</h1>
					<ul class="list-inline text-center">
						<li>Ecrivain |</li>
						<li>Acteur |</li>
						<li>Aventurier |</li>
					</ul>
				</div>
			</div>
	</section>
	<section>
		<!--Si j'ai des éléments dans ma session flash alors je parcours l'éléments et affiche le message -->
		<?php if(isset($_SESSION['flash'])): ?>
		<!-- Récupère le type du message ( success danger) et récupère la valeur-->
			<?php foreach($_SESSION['flash'] as $type => $message): ?>
				<div class="alert alert-<?= $type; ?>">
					<?= $message; ?>
				</div>
			<?php endforeach; ?>
			<!-- Une fois affiché on efface le flash-->
			<?php unset($_SESSION['flash']); ?>
		<?php endif; ?>
	</section>


    <?= $content ?> 

</div><!-- container -->
	<footer>
	</footer><!-- jQuery -->
	<script src="public/js/app.js"></script>

     <!-- <script src="https://kit.fontawesome.com/9104e626a0.js" crossorigin="anonymous"></script> -->

	<script src="public/js/jquery-1.11.3.min.js">
	</script> <!-- Bootstrap Core JavaScript -->
	 
	<script src="public/js/bootstrap.min.js">
	</script> <!-- IE10 viewport bug workaround -->
	 
	<script src="public/js/ie10-viewport-bug-workaround.js">
	</script> <!-- Placeholder Images -->
	 
	<script src="public/js/holder.min.js"></script>
</body>
</html>