<?php
    try{
         $pdo=new PDO("mysql:host=localhost;dbname=g_rapport_service","root",""); 
    }catch(Exception $e){
        die('Erreur de connexion :' .$e->getMessage());
    }

?>