<?php
class Manager
{
    protected function dbConnect()
    {
        $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }    

}

/* Configuration sur serveur IONOS 


<?php
class Manager
{
  protected function dbConnect(){
      
      $host_name = 'db5000645993.hosting-data.io';
      $database = 'dbs602275';
      $user_name = 'dbu437745';
      $password = '5Wn67ZdGe$';
      $dbh = null;

      try {
      
        $pdo = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      } 
      
    catch (PDOException $e) {
      
      echo "Erreur!: " . $e->getMessage() . "<br/>";
      
      die();
      
    }
  }
}
?>   */
