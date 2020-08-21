<?php
    require_once('identifiant.php');
    require_once("connexiondb.php");
    
/*
    if(isset($_GET['nomP']))
        $nomP=$_GET['nomP'];
    else
        $nomP="";
*/
    $login=isset($_GET['login'])?$_GET['login']:"";

    $size=isset($_GET['size'])?$_GET['size']:3;

    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset=($page-1)*$size;
    
    //$categorie=$_GET['categorie'];

    $requete="select * from utilisateur where login like '%$login%'";
        
    $requeteCount="select count(*) countU from utilisateur";

    $resultatU=$pdo->query($requete);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrUtilisateur=$tabCount['countU'];
    $reste=$nbrUtilisateur % $size;

    if($reste===0)
        $nbrPage=$nbrUtilisateur/$size;
    else
        $nbrPage=floor($nbrUtilisateur/$size)+1;
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>
            GESTION DES UTILISATEURS
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Rechercher...</div>
                <div class="panel-body">
                   <form method="get" action="utilisateur.php" class="form-inline">
                       <div class="form-group">
                            <input 
                                   type="text" 
                                   name="login" 
                                   placeholder="login" 
                                   class="form-control" 
                                   value="<?php echo $login; ?>">
                        </div>
                       <!--<label for="categorie">Heure demande :</label>
                       <select name="heure" class="form-control" id="categorie" onchange="this.form.submit()">
                           <option value="all" <?php //if($heure==="all") echo"selected" ?>>Tout</option>
                           <option value="50" <?php //if($heure==="50") echo"selected" ?>>50</option>
                           <option value="60" <?php //if($heure==="60") echo"selected" ?>>60</option>
                           <option value="120" <?php //if($heure==="120") echo"selected" ?>>120</option>
                       </select>-->
                       
                       <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-search"></span>Rechercher...
                       </button>
                       &nbsp &nbsp
                       
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des utililisateurs(<?php echo $nbrUtilisateur ?> utilisateur(s))</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th>Login</th><th>E-mail</th><th>Role</th>
                                <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                    <th>Actions</th>
                                <?php }?>
                           </tr>
                       </thead>
                       
                       <tbody>
                           
                               <?php while($utilisateur=$resultatU->fetch()){ ?>
                                    <tr class='<?php echo $utilisateur['etat']==1?'success':'danger' ?>'>
                                        <td><?php echo $utilisateur['login'] ?></td>
                                        <td><?php echo $utilisateur['email'] ?></td>
                                        <td><?php echo $utilisateur['role'] ?></td>
                                        <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                                <td>
                                                    <a 
                                                    href="editerUser.php?idU=<?php echo $utilisateur['id'] ?>">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a onclick="return confirm('Etes vous sur de vouloir suprimer cet utilisateur')"
                                                        href="suprimerUser.php?idU=<?php echo $utilisateur['id'] ?>">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a 
                                                    href="activerUser.php?idU=<?php echo $utilisateur['id'] ?>&etat=<?php echo $utilisateur['etat']  ?> ">
                                                            <?php 
                                                                if($utilisateur['etat']==1)
                                                                    echo '<span class="glyphicon glyphicon-remove"></span>';
                                                                else
                                                                    echo '<span class="glyphicon glyphicon-ok"></span>';  
                                                            ?>
                                                    </a>
                                                    
                                                </td>
                                        <?php }?>
                                    </tr>
                               <?php } ?>
                           
                       </tbody>
                   </table>
                    
                    <div>
                        <ul class="nav nav-pills">
                            <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                                <li class="<?php if($i==$page) echo'active' ?>"> 
                                    <a href="utilisateur.php?page=<?php echo $i; ?>&login=<?php echo $login ?>">
                                        Page <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</HTML>