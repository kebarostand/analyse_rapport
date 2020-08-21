<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

    $idP=isset($_POST['idP'])?$_POST['idP']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $postnom=isset($_POST['postnom'])?$_POST['postnom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $telephone=isset($_POST['telephone'])?$_POST['telephone']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    $idBapteme=isset($_POST['idBapteme'])?$_POST['idBapteme']:0;
    $idPionnier=isset($_POST['idPionnier'])?$_POST['idPionnier']:0;
    $idGroupe=isset($_POST['idGroupe'])?$_POST['idGroupe']:0;
    //$heure=isset($_POST['heure'])?strtoupper($_POST['heure']):"";
    
    $requete="update proclamateur set nom=?, postnom=?, prenom=?, 
        civilite=?, telephone=?, email=?, idBapteme=?, idPionier=?, idGroupe=? where id=?";
    $params=array($nom,$postnom, $prenom, $civilite, $telephone, $email, $idBapteme, $idPionnier, $idGroupe, $idP);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 
 

    header('location:proclamateur.php');
?>