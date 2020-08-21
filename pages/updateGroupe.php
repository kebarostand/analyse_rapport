<?php
    require_once('identifiant.php');

    require_once('connexiondb.php');

    $id=isset($_POST['idG'])?$_POST['idG']:0;
    $nomG=isset($_POST['nomG'])?$_POST['nomG']:"";
    $idProclamateur=isset($_POST['idProclamateur'])?$_POST['idProclamateur']:"";
    //$heure=isset($_POST['heure'])?strtoupper($_POST['heure']):"";
    
    $requete="update groupe set nom=?, idProclamateur=?where id=?";
    $params=array($nomG,$idProclamateur,$id);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 

    header('location:groupe.php');
?>