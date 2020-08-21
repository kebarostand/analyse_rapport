<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

    $id=isset($_POST['id'])?$_POST['id']:0;
    $login=isset($_POST['login'])?$_POST['login']:"";
    $email=isset($_POST['email'])?($_POST['email']):"";
    
    $requete="update utilisateur set login=?, email=? where id=?";
    $params=array($login, $email, $id);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params); 
 

    header('location:login.php');
?>