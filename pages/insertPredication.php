<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $annee_predication=isset($_POST['annee_predication'])?$_POST['annee_predication']:"";
    $date_debut=isset($_POST['date_debut'])?$_POST['date_debut']:"";
    $date_fin=isset($_POST['date_fin'])?$_POST['date_fin']:"";
    
    $requete="insert into predication(annee_predication, date_debut,date_fin) values(?,?,?)";
    $params=array($annee_predication,$date_debut, $date_fin);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 

    header('location:anneeService.php');
?>