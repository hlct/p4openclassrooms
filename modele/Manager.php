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