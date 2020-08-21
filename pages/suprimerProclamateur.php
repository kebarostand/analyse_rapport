<?php
   session_start();
   if(!isset($_SESSION['user'])){
        require_once('connexiondb.php');

        $id=isset($_GET['idP'])?$_GET['idP']:0;
        
        $requete="delete from proclamateur where id=?";
        $params=array($id);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params); 
        header('location:proclamateur.php');
   }
   else{
        header('location:login.php');
   }
       
    
    
   

   
?>