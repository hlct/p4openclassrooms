<?php
require_once('modele/AdminManager.php');

class AdminController{


	
	function register(){
		$create = new AdminManager();

		if(!empty($_POST)){

			$errors = array();	
			/* Si le champs est vide ou ne correspond pas à l'expression régulière (répété plusieurs fois) pour bloquer les champs ci-dessous*/
			if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){

				 $errors['username'] = "Votre pseudo n'est pas valide";

			}
			/* Si le champs est vide,( fonction filter_var /  Filtre une variable avec un filtre spécifique) si le filter_var est différent de true alors ne valide pas */
			if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){

				$errors['password'] = "Vous devez rentrer un mot de passe valide";
			}
			/* Si le champs errors est vide, on prépare la requete, on hash le mot de passe on execute la requete, on informe qu'un compte est créé*/
			if(empty($errors)){
		
				$user = $create -> create();
				$success ="Votre compte a bien été créé ! <a  href='index.php?action=displaylogin'>Me connecter</a>";
			}
		}
		require('views/FrontEnd/creationcompte.php');


	} 

	function login(){  

		$create = new AdminManager();

		
		if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){

		$users = $create -> displayLogin();

		}
		if(isset($_POST['password'])){

			/*Si le mot passe correspond au mot de passe haché alors connecte le user*/
			if(password_verify ($_POST['password'], $users ['password'])){

				$_SESSION['auth'] = $users;

				$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';

				header('Location: index.php?action=displayadmin');

			}else{

				$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';

			}	
		}
					
	}
	function logout(){  
		
		$create = new AdminManager();
		session_start();
		/*Supprime la partie authentification*/
		unset($_SESSION['auth']);
		$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
		header('Location: index.php?action=accueil');

 	}


	function admin(){
		
		$create = new AdminManager();
		$admin = $create -> displayAdmin();
		$homechapters = $create -> displayChap();
		$displaychaps = $create -> displayChapAdmin();
		$displayarticles = $create -> displayChap();
		$displaycommentaires = $create -> displayCommentsAdmin();
		$flags = $create -> displayFlag();
		require('views/BackEnd/Adminview.php');



	}

	function create(){  
		
		$create = new AdminManager();


		if(isset($_POST['article_titre'], $_POST['article_contenu'])){

			if(!empty($_POST ['article_titre']) AND !empty($_POST['article_contenu'])){
									
				if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {

					/*Si une photo est envoyée au format png (3)*/
					if(exif_imagetype($_FILES['miniature']['tmp_name']) == 3) {

					$newcreate = $create -> displaycreate($_POST["article_titre"],$_POST["article_contenu"]);
					
					/*Chemin de la miniatures*/
					$chemin = 'public/miniatures/'.$newcreate.'.png';

					move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);

					$_SESSION['flash']['success'] = 'Votre article a bien été posté.';

					header('Location: index.php?action=displayadmin');


					}else {
					$_SESSION['flash']['danger'] = 'Votre image doit être au format png.';
                	}
				}	
			}else{
				$_SESSION['flash']['danger'] = 'Veuillez remplir les champs';
			}
		}
	}

	function update(){

		$create = new AdminManager();
		$homechapters = $create -> displayChap();
		$edit_article = $create -> displayupdate($_GET['id']);
		require('views/BackEnd/update_articles.php');

	}

	function displayupdate(){

		$create = new AdminManager();
		
		if(isset($_POST['article_titre'], $_POST['article_contenu'], $_GET["id"])){

			if(!empty($_POST ['article_titre']) AND !empty($_POST['article_contenu'])){

				$update = $create -> updatechap($_POST["article_titre"],$_POST["article_contenu"],$_GET["id"]);

				$_SESSION['flash']['success'] = 'Votre article a bien été mis à jour.';
					
				header('Location: index.php?action=displayadmin');


			}
		
		}
	} 

	function suppr(){

		$create = new AdminManager();

		if(isset($_GET['id']) AND !empty($_GET['id'])) {

			$supprimer = $create -> supprchap($_GET["id"]);

			$_SESSION['flash']['success'] = 'Votre article a bien été supprimé.';

			header('Location: index.php?action=displayadmin ');
		 }

	}

	function displayupdatecomment(){
				
		$create = new AdminManager();
		$homechapters = $create -> displayChap();
		$edit_article = $create -> displayupdatecomment($_GET['id']);
		require('views/BackEnd/update_commentaires.php');

	}


	function updatecomment(){

		$create = new AdminManager();


		if(isset($_POST['commentaire_titre'], $_POST['commentaire_contenu'], $_GET["id"])){

			if(!empty($_POST ['commentaire_titre']) AND !empty($_POST['commentaire_contenu'])){

				$update = $create -> updatecomment($_POST["commentaire_titre"],$_POST["commentaire_contenu"],$_GET["id"]);

				header('Location: index.php?action=displayadmin');
		
				$_SESSION['flash']['success'] = 'Votre commentaire a bien été mis à jour.';

			}
		
		}
	}


	function supprcomment(){

		$create = new AdminManager();

		if(isset($_GET['id']) AND !empty($_GET['id'])) {

			$supprimer = $create -> supprcomment($_GET["id"]);

			$_SESSION['flash']['success'] = 'Le commentaire a bien été supprimé.';

			header('Location: index.php?action=displayadmin ');
		 }
		 

	}

	function supprflag(){

		$create = new AdminManager();

		if(isset($_GET['id']) AND !empty($_GET['id'])) {

			$supprimerflag = $create -> supprflag($_GET["id"]);

			$_SESSION['flash']['success'] = 'Le signalement a bien été supprimé.';

			header('Location: index.php?action=displayadmin ');
			
		 }
		 

	}



	
}



?>