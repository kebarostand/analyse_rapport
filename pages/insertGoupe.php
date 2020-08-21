<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    
    $nomG=isset($_POST['nomG'])?$_POST['nomG']:"";
    $idProclamateur=isset($_POST['idProclamateur'])?$_POST['idProclamateur']:"";
    
    $requete="insert into groupe(nom, idProclamateur) values(?,?)";
    $params=array($nomG,$idProclamateur);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 

    header('location:groupe.php');
?>