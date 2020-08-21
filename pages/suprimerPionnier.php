<?php
    session_start();
    if(!isset($_SESSION['user'])){
        require_once('connexiondb.php');

        $id=isset($_GET['idP'])?$_GET['idP']:0;
        $requeteProclamateur="select count(*) countProclamateur from proclamateur where idPionier=$id";
        $resultatPro=$pdo->prepare($requeteProclamateur);
        $tabCountPro=$resultatPro->fetch();
        $nbrProcl=$tabCountPro['countProclamateur'];

        if($nbrProcl==0){
            $requete="delete from pionier where id=?";
            $params=array($id);
            $resultat=$pdo->prepare($requete);
            $resultat->execute($params); 
            header('location:pionier.php');
        }else{
            $msg="Suppresion Impossible:Il existe de pionnier parmi le proclammateur";
            header("location:alerte.php?message=$msg");
        }
    }else{
        header('location:login.php');
    }
    
   

   
?>