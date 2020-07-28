<?php
	session_start();
	require_once('controler/AdminController.php');
	require_once('controler/ChaptersController.php');
	require_once('controler/CommentsController.php');


	class Routeur{
		function init(){
			$adminController = new AdminController();
			$chaptersController = new ChaptersController();
			$commentsController = new CommentsController();
			
			try{
			    if (isset($_GET['action'])) {
			        if ($_GET['action'] == 'accueil') {
						$chaptersController -> display();	
					}
					if ($_GET['action'] == 'displayChap') {
						$chaptersController -> chapitres();
					}
					if ($_GET['action'] == 'ajoutcommentaire') {							
						$commentsController -> addcomments();
					} 
					if ($_GET['action'] == 'signalcommentaire') {							
						$commentsController -> flagcomments();
					}
					if ($_GET['action'] == 'displayregister') {
						$adminController -> register();	
					}
					if ($_GET['action'] == 'displaylogin') {
						require('views/FrontEnd/login.php'); 
					}  
					if ($_GET['action'] == 'login') {
						$adminController -> login();
					}
					if ($_GET['action'] == 'displayadmin') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> admin();
						}						
					}
					if ($_GET['action'] == 'logout') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> logout();
						}
					}
					if ($_GET['action'] == 'create') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							require('views/BackEnd/create_articles.php'); 
						}
					}
					if ($_GET['action'] == 'createarticle') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> create();
						}
					}
					if ($_GET['action'] == 'edit') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> update();

						}
					}
					if ($_GET['action'] == 'updatearticle') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> displayupdate();
						}
					}
					if ($_GET['action'] == 'suppr') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> suppr();
						}
					}
					if ($_GET['action'] == 'editcomment') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> displayupdatecomment();
						}
					}
					if ($_GET['action'] == 'updatecomment') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> updatecomment();
						}
					}
					if ($_GET['action'] == 'supprcomment') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> supprcomment();
						}
					}
					if ($_GET['action'] == 'supprflag') {
						if(!isset($_SESSION['auth'])){
							$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
							header('Location: index.php?action=displaylogin');
						}else{
							$adminController -> supprflag();
						}
					}
		
					
				}
			    
			    else {
					/*Affiche la home par défaut si aucune action n'est trouvée*/
			        $chaptersController -> display();
			    }
			}
			catch(Exception $e) {
			    echo 'Erreur : ' . $e->getMessage();
			}
		}

	}

	$routeur = new Routeur();
	$routeur -> init();
