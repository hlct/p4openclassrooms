<?php
require_once('modele/CommentsManager.php');

class CommentsController{


	function addcomments(){
		$create = new CommentsManager();
		$addCommentaires = $create -> displayaddComments($_POST["pseudo"],$_POST["commentaire"],$_GET["id"]);
			if (isset($_POST['pseudo'],$_POST['commentaire'] )) {

				$_SESSION['flash']['success'] = 'Votre commentaire a bien été ajouté';
			}
		$homechapters = $create -> displayChap();
		$chapters = $create -> displayArticles($_GET['id']);
		$commentaires = $create -> displayComments($_GET['id']);
		
		require('views/FrontEnd/contenu_articles.php');
	} 




	
	function flagcomments(){
		$create = new CommentsManager();
		$flagcommentaire = $create -> displayflagComments($_POST["nameflag"],$_POST["flag"],$_GET["id"]);
		$homechapters = $create -> displayChap();
		$chapters = $create -> displayArticles($_GET['id']);
		$commentaires = $create -> displayComments($_GET['id']);

			if(isset($_POST['submit_flag_commentaire'])) {
				$_SESSION['flash']['success'] = 'Votre signalement a bien été posté';
			}
		
		
		require('views/FrontEnd/contenu_articles.php');
	}

	
}



?>