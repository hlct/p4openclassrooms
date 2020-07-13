<?php
require_once('Manager.php');

class ChaptersManager extends Manager
{
    public function displayChap(){
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM posts');
        $req -> execute(array());
        return $req;
        
    }
    public function displayArticles($id){
        $pdo = $this->dbConnect();
        $req = $pdo->prepare('SELECT * FROM posts WHERE id = :id ');
        $req -> execute(array(
            "id" => $id,
        ));
        return $req -> fetch();   
    }

    public function displayComments($id){
        $pdo = $this->dbConnect();
        $req = $pdo->prepare('SELECT * FROM comments WHERE id_article = :id');
        $req -> execute(array(
            "id" => $id
        ));
        return $req;   

    }
    
}
?>