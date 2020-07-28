<?php
require_once('Manager.php');

class CommentsManager extends Manager
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

    public function displayaddComments($pseudo,$commentaire,$id){
        $pdo = $this->dbConnect();
        $req = $pdo->prepare('INSERT INTO comments (pseudo, commentaire,id_article) VALUES (:pseudo,:commentaire,:id_article)');
        $req -> execute(array(
            "pseudo" => $pseudo,
            "commentaire" => $commentaire,
            "id_article" => $id

        ));

        return $req;
    
    }

    public function displayFlag(){
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM comments_flags');
        $req -> execute(array());
        return $req;
     

    }

    public function displayflagComments($nameflag,$commentaire,$id){
        $pdo = $this->dbConnect();
        $req = $pdo->prepare('INSERT INTO comments_flags (comment_id, flag, date_added) VALUES (:comment_id,:flag,NOW())');
        $req -> execute(array(
            "comment_id" => $nameflag,
            "flag" => $commentaire,
            
        ));

    }
}
?>