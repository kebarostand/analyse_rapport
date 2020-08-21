<?php
    session_start();
    if(!isset($_SESSION['user'])){
        require_once('connexiondb.php');

        $id=isset($_GET['idP'])?$_GET['idP']:0;
        $requeteProclamateur="select count(*) countP from precher where idPredication=$id";
        $resultatPre=$pdo->prepare($requeteProclamateur);
        $tabCountPre=$resultatPre->fetch();
        $nbrPre=$tabCountPre['countP'];

        if($nbrPre==0){
            $requete="delete from predication where id=?";
            $params=array($id);
            $resultat=$pdo->prepare($requete);
            $resultat->execute($params); 
            header('location:anneeService.php');
        }else{
            $msg="Suppresion Impossible:Il existe de pionnier parmi le proclammateur";
            header("location:alerte.php?message=$msg");
        }
    }
    
   

   
?>