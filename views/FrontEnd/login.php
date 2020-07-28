<?php ob_start(); ?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
       <a href="index.php?action=accueil"><img src="http://myexe29.fr/wp-content/uploads/2020/07/jf-1.png" id="icon" alt="User Icon"/></a>
    </div>
    <br>
    <form action="index.php?action=login" method="POST">
      <input type="text" id="login" class="form-login" class="fadeIn second" name="username" placeholder="Pseudo">
      <br>
      <input type="password" id="password" class="form-login" class="fadeIn third" name="password" placeholder="Mot de passe">
      <br>
      <br>
      <input type="submit" class="form-submit" class="fadeIn fourth" value="Se connecter">
      <br>
      <br>
    </form>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('views/templatelogin.php'); ?>