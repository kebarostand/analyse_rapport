<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $id=isset($_GET['id'])?$_GET['id']:0;
    $requete="select * from utilisateur where id=$id";

    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();

    $login=$utilisateur['login'];
    $email=$utilisateur['email'];

?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Editer un utilisisateur
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de l'utilisateur</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="updateUtilisateur.php" class="form" >
                        <div class="form-group">
                           <!--<label for="id">Id : <?php echo $id ?></label>-->
                            <input 
                                   type="hidden" 
                                   name="id" 
                                   class="form-control" 
                                   value="<?php echo $id ?>"
                           />
                        </div>
                        
                       <div class="form-group">
                           <label for="login">Login :</label>
                            <input 
                                   type="text" 
                                   name="login" 
                                   placeholder="Login"
                                   class="form-control" 
                                   value="<?php echo $login ?>"
                            />
                        </div>
                        <div class="form-group">
                           <label for="email">E-mail:</label>
                           <input 
                                   type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="<?php echo $email ?>"
                            />
                       </div>
                       
                       
                       <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-save"></span>Enregistrer
                       </button>
                       <a href="editPwd.php">Change le mot de passe</a>
                      </form>
                    
                </div>
                
            </div>
        </div>
        
    </body>
</HTML>