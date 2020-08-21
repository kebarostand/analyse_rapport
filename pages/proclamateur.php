<?php
   require_once('identifiant.php');

    require_once("connexiondb.php");
    
/*
    if(isset($_GET['nomP']))
        $nomP=$_GET['nomP'];
    else
        $nomP="";
*/
    $nom=isset($_GET['nom'])?$_GET['nom']:"";
    $postnom=isset($_GET['postnom'])?$_GET['postnom']:"";
    $prenom=isset($_GET['prenom'])?$_GET['prenom']:"";
    $civilite=isset($_GET['civilite'])?$_GET['civilite']:"";
    $telephone=isset($_GET['telephone'])?$_GET['telephone']:"";
    $email=isset($_GET['email'])?$_GET['email']:"";
    $email=isset($_GET['email'])?$_GET['email']:"";

    $size=isset($_GET['size'])?$_GET['size']:6;

    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset=($page-1)*$size;
    
    //$categorie=$_GET['categorie'];
    if($civilite=="all"){

        $requete="SELECT * FROM vproclamateur  
            where pr.nom like '%$nom%'
            limit $size
            offset $offset";
        
        $requeteCount="select count(*) countP from vproclamateur
            where nom like '%$nom%'";

    }else{
        $requete="SELECT * FROM vproclamateur
            where nom like '%$nom%'
            limit $size
            offset $offset";

            $requeteCount="select count(*) countP from vproclamateur
            where nom like '%$nom%'";
    }
    
    $resultatP=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrProcl=$tabCount['countP'];
    $reste=$nbrProcl % $size;

    if($reste===0)
        $nbrPage=$nbrProcl/$size;
    else
        $nbrPage=floor($nbrProcl/$size)+1;
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>
            GESTION DE PROCLAMATEUR
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
                   <form method="get" action="proclamateur.php" class="form-inline">
                       <div class="form-group">
                            <input 
                                   type="text" 
                                   name="nom" 
                                   placeholder="Taper le nom du proclamateur" 
                                   class="form-control" 
                                   value="<?php echo $nom; ?>">
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
                       <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                            <a href="newProclamateur.php">
                                <span class="glyphicon glyphicon-plus"></span>

                                    Nouveau proclamateur

                            </a>
                       <?php }?>
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">le(s) Proclamateur(s)(<?php echo $nbrProcl ?> Pionnier(s))</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th>Id</th><th>Nom</th><th>post nom</th><th>Prenom</th><th>Civilité</th><th>Telephone</th><th>E-mail</th><th>Bapteme</th><th>Pionnier</th><th>Groupe</th>
                                <?php if($_SESSION['user']['role']=='ADMIN') {?>
                                    <th>Actions</th>
                                <?php } ?>
                           </tr>
                       </thead>
                       
                       <tbody>
                           
                               <?php while($proclamateur=$resultatP->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $proclamateur['numero'] ?></td>
                                        <td><?php echo $proclamateur['nom'] ?></td>
                                        <td><?php echo $proclamateur['postnom'] ?></td>
                                        <td><?php echo $proclamateur['prenom'] ?></td>
                                        <td><?php echo $proclamateur['civilite'] ?></td>
                                        <td><?php echo $proclamateur['telephone'] ?></td>
                                        <td><?php echo $proclamateur['email'] ?></td>
                                        <td><?php echo $proclamateur['idBapteme'] ?></td>
                                        <td><?php echo $proclamateur['pionnier'] ?></td>
                                        <td><?php echo $proclamateur['groupe'] ?></td>
                                        
                                        <?php if($_SESSION['user']['role']=='ADMIN') {?>
                                            <td>
                                                <a 
                                                href="editerProclamateur.php?idP=<?php echo $proclamateur['numero'] ?>">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp
                                                <a onclick="return confirm('Etes vous sur de vouloir suprimer cette categorie de pionnier')"
                                                    href="suprimerProclamateur.php?idP=<?php echo $proclamateur['numero'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                                
                                            </td>
                                        <?php } ?>
                                    </tr>
                               <?php } ?>
                           
                       </tbody>
                   </table>
                    
                    <div>
                        <ul class="nav nav-pills">
                            <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                                <li class="<?php if($i==$page) echo'active' ?>"> 
                                    <a href="proclamateur.php?page=<?php echo $i; ?>&nom=<?php echo $nom ?>">
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