<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

    $idU=$_SESSION['user']['id'];

    $oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";

    $newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";
 
    $requette="select * from utilisateur where id=$idU and pwd=$oldpwd";

    $resultat=$pdo->prepare($requette);

    $resultat->execute();

    $erreur=array();

    if($resultat->fetch()){
        $requette="update utilisateur set pwd=MD5(?) where id=?";

        $params=array($newpwd,$idU);

        $resultat=$pdo->prepare($requette);

        $resultat->execute($params);
    }else{
        $erreur="<strong> Erreur! </strong> l'ancien mot de passe est incorrect !!!";
    }
    header('location:utilisateur.php');
?>