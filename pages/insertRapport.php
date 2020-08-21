<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

    $idProclamateur=isset($_POST['idProclamateur'])?$_POST['idProclamateur']:0;
    $idPredication=isset($_POST['idPredication'])?$_POST['idPredication']:0;
    $periodique=isset($_POST['periodique'])?$_POST['periodique']:0;
    $video=isset($_POST['video'])?$_POST['video']:0;
    $heure=isset($_POST['heure'])?$_POST['heure']:0;
    $nouvel_visite=isset($_POST['nouvel_visite'])?$_POST['nouvel_visite']:0;
    $etude_bublique=isset($_POST['etude_bublique'])?$_POST['etude_bublique']:0;
    $mois=isset($_POST['mois'])?$_POST['mois']:"";
    //$heure=isset($_POST['heure'])?strtoupper($_POST['heure']):"";
    
    $requete="insert into precher(idProclamateur, idPredication, periodique, video, heure, nouvel_visite, etude_bublique, mois) values(?,?,?,?,?,?,?,?)";
    $params=array($idProclamateur,$idPredication, $periodique, $video, $heure, $nouvel_visite, $etude_bublique, $mois);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 
 
    //echo "ok";
    header('location:rapport.php');
?>

