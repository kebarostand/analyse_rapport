<?php
   session_start();
   if(!isset($_SESSION['user'])){
        require_once('connexiondb.php');

        $id=isset($_GET['idG'])?$_GET['idG']:0;
        
        $requete="delete from groupe where id=?";
        $params=array($id);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params); 
        header('location:groupe.php');
   }
   else{
        header('location:login.php');
   }
       
    
    
   

   
?>