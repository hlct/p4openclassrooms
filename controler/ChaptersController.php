<?php
require_once('modele/ChaptersManager.php');

class ChaptersController{
	
	function display(){
		$create = new ChaptersManager();
		$displayarticles = $create -> displayChap();
		$homechapters = $create -> displayChap();
		require('views/FrontEnd/home.php');
	}





	function chapitres(){
		$create = new ChaptersManager();
		$homechapters = $create -> displayChap();
		$chapters = $create -> displayArticles($_GET['id']);
		$commentaires = $create -> displayComments($_GET['id']);
		require('views/FrontEnd/contenu_articles.php');
    }
    
    
	 

    }
?>