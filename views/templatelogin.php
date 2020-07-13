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

	


<div class="container">
	<br>
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