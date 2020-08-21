<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $nomP=isset($_POST['nomP'])?$_POST['nomP']:"";
    $heure=isset($_POST['heure'])?$_POST['heure']:"";
    
    $requete="insert into pionier(nom, heureDmd) values(?,?)";
    $params=array($nomP,$heure);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);   

    header('location:pionier.php');
?>