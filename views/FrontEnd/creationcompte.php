<?php ob_start();?>

<h1>S'inscrire</h1>

<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach($errors as $error): ?>
           <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php if(isset($success)): ?>
		
		<div class="alert alert-success">
		<p><?php echo $success; ?></p>
	</div>

<?php endif;?>

<form action="" method="POST">

    <div class="form-group">
        <label for="">Pseudo</label>
        <input type="text" name="username" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="">Mot de passe</label>
        <input type="password" name="password" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="">Confirmez votre mot de passe</label>
        <input type="password" name="password_confirm" class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>

	<?php $content = ob_get_clean(); ?>
	<?php require('views/templatelogin.php'); ?>