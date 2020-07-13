<?php
require 'inc/functions.php';
logged_only();

    require_once 'inc/db.php';

if(isset($_GET['id']) AND !empty($_GET['id'])) {

   $suppr_id = htmlspecialchars($_GET['id']);

   $suppr = $pdo->prepare('DELETE FROM comments WHERE id = ?');

   $suppr->execute(array($suppr_id));

   header('Location: interfaceAdmin.php ');
}
?>