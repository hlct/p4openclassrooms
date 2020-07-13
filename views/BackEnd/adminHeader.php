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
	<link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom CSS -->
	<link href="css/app.css" rel="stylesheet"><!-- Custom CSS -->
    <html>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        forced_root_block : false,
        force_br_newlines : true,
        force_p_newlines : false,
        language: 'fr_FR',
        

    });
    </script> 
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<!-- Logo and responsive toggle -->
			<div class="navbar-header">
				<button class="navbar-toggle" data-target="#navbar" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="home.php">Jean Forteroche</a>
			</div><!-- Navbar links -->
			<div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
			<li class="dropdown">
						<a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Chapitres<span class="caret"></span></a>
						<ul aria-labelledby="about-us" class="dropdown-menu">
							<li>
								<a href="contenu_articles.php?id=25">1 - L'introduction</a>
							</li>
							<li>
								<a href="contenu_articles.php?id=21">2 - John le dirigeant</a>
							</li>
							<li>
								<a href="contenu_articles.php?id=22">3 - Séparation</a>
							</li>
							<li>
								<a href="contenu_articles.php?id=23">4 - Retrouvaille</a>
							</li>
							<li>
								<a href="contenu_articles.php?id=24">5 - Un jour sans toi </a>
							</li>
						</ul>
					</li>
                <?php if (isset($_SESSION['auth'])): ?>
                    <li><a href="interfaceAdmin.php">Tableau de bord</a></li>
                    <li><a href="logout.php">Se déconnecter</a></li>
                <?php else: ?>  
                    <li><a href="login.php">Se connecter</a></li>
                <?php endif; ?>
                
				</ul>
			</div>
		</div>
	</nav>


<div class="container">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Bonjour Jean</h1>
    <p class="lead">Que souhaitez vous faire ?</p>
  </div>
</div>

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


    