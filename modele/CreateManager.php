<?php
require_once('Manager.php');

class CreateManager extends Manager
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

    public function create(){

        $pdo = $this->dbConnect();
        $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?");

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req->execute([$_POST['username'], $password, $_POST['email']]);
        
    }
    

    public function displayLogin(){
        
        $pdo = $this->dbConnect();
        
        $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');

        $req->execute(['username' => $_POST['username']]);

        $users = $req->fetch();

        return $users;
    }


    public function displayAdmin(){
        
        $pdo = $this->dbConnect();

        $req = $pdo->query('SELECT * FROM posts ORDER BY created DESC');

        return $req;
       
    }

    public function displayChapAdmin(){
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM posts');
        $req -> execute(array());
        return $req;
        
    }

    public function displayCommentsAdmin(){
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM comments');
        $req -> execute(array());
        return $req;
        
    }

    public function displaycreate($article_titre,$article_contenu){
        
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('INSERT INTO posts (name, content, created) VALUES (:article_titre,:article_contenu, NOW())');

        $req -> execute(array(
            "article_titre" => $article_titre,
            "article_contenu" => $article_contenu
        ));

        $lastid = $pdo->lastInsertId();

        return $lastid;


    }

    /*Affiche le titre et le contenu de l'article*/
    public function displayupdate($id){

        $pdo = $this->dbConnect();
        $req = $pdo->prepare('SELECT * FROM posts WHERE id = :id ');
        $req -> execute(array(
            "id" => $id,
        ));
        $edit_article = $req -> fetch(); 

        return $edit_article;
    
      
         
    }

    public function updatechap($article_titre,$article_contenu,$edit_article){
        
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('UPDATE posts SET name = :name , content = :content WHERE id=:id');
    
        $req -> execute(array(
            "name" => $article_titre,
            "content" => $article_contenu,
            "id" => $edit_article,

        ));

    }

    public function supprchap($id){
        
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('DELETE FROM posts WHERE id= :id');

        $req -> execute(array(

            "id" => $id

        ));

    }

    public function displayupdatecomment($id){

        $pdo = $this->dbConnect();
        $req = $pdo->prepare('SELECT * FROM comments WHERE id = :id ');
        $req -> execute(array(
            "id" => $id,
        ));
        $edit_article = $req -> fetch(); 

        return $edit_article;
    
    }

    public function updatecomment($commentaire_titre,$commentaire_contenu,$edit_article){
        
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('UPDATE comments SET pseudo = :pseudo , commentaire = :commentaire WHERE id=:id');
    
        $req -> execute(array(
            "pseudo" => $commentaire_titre,
            "commentaire" => $commentaire_contenu,
            "id" => $edit_article,

        ));

    }
    public function supprcomment($id){
        
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('DELETE FROM comments WHERE id= :id');

        $req -> execute(array(

            "id" => $id

        ));

    }

    public function supprflag($id){
        
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('DELETE FROM comments_flags WHERE id= :id');

        $req -> execute(array(

            "id" => $id

        ));
    }

    
}
?>