<?php
    session_start();
    if(!isset($_SESSION['user'])){
        require_once('connexiondb.php');

        $id=isset($_GET['idU'])?$_GET['idU']:0;
        
        $requete="delete from utilisateur where id=?";
        $params=array($id);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params); 
        header('location:utilisateur.php');
    }
    else{
        header('location:login.php');
    }
    
    
   

   
?>