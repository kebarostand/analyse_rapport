<?php
    require_once('identifiant.php');

    require_once('connexiondb.php');

    $id=isset($_POST['idP'])?$_POST['idP']:0;
    $nomP=isset($_POST['nomP'])?$_POST['nomP']:"";
    $heure=isset($_POST['heure'])?$_POST['heure']:"";
    //$heure=isset($_POST['heure'])?strtoupper($_POST['heure']):"";
    
    $requete="update pionier set nom=?, heureDmd=?where id=?";
    $params=array($nomP,$heure,$id);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 

    header('location:pionier.php');
?>