<?php
    session_start();
    require_once('connexiondb.php');
    $login=isset($_POST['login'])?$_POST['login']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    $requete="select id,login, email,role,etat from utilisateur where login='$login' and pwd=md5('$pwd')";
    $resultat=$pdo->query($requete);
    
    if($user=$resultat->fetch()){
        if($user['etat']==1){
            $_SESSION['user']=$user;
            header('location:../index.php');
        }
        else{
            $_SESSION['erreurLogin']="<trong>Ereur!!</trong> Votre compte est desactivé.<br>Veillez contacter l'admistrateur";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['erreurLogin']="<strong>Ereur!!</strong> Login ou mot de passe";
        header('location:login.php');
    }
   
?>
