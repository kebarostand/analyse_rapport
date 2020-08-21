<?php
    session_start();
    if(!isset($_SESSION['user'])){
        require_once('connexiondb.php');

        $idU=isset($_GET['idU'])?$_GET['idU']:0;
        $etat=isset($_GET['etat'])?$_GET['etat']:0;

        if($etat==1)
            $newEtat=0;
        else
            $newEtat=1;
        
        $requete="update utilisateur set etat=? where id=?";
        $params=array($newEtat, $idU);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params); 
    

        header('location:utilisateur.php');
    }else{
        header('location:login.php');
    }

    
?>