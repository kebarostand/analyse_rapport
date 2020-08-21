<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

    $id=isset($_POST['idP'])?$_POST['idP']:0;
    $annee_predication=isset($_POST['annee_predication'])?$_POST['annee_predication']:"";
    $date_debut=isset($_POST['date_debut'])?$_POST['date_debut']:"";
    $date_fin=isset($_POST['date_fin'])?$_POST['date_fin']:"";
    //$heure=isset($_POST['heure'])?strtoupper($_POST['heure']):"";
    
    $requete="update predication set annee_predication=?, date_debut=?, date_fin=? where id=?";
    $params=array($annee_predication,$date_debut, $date_fin,$id);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 

    header('location:anneeService.php');
?>