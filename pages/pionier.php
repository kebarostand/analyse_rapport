<?php
    require_once('identifiant.php');

    require_once("connexiondb.php");
    
/*
    if(isset($_GET['nomP']))
        $nomP=$_GET['nomP'];
    else
        $nomP="";
*/
    $nomP=isset($_GET['nomP'])?$_GET['nomP']:"";

    $heure=isset($_GET['heure'])?$_GET['heure']:"all";


    $size=isset($_GET['size'])?$_GET['size']:6;

    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset=($page-1)*$size;
    
    //$categorie=$_GET['categorie'];
    if($heure=="all"){

        $requete="select * from pionier 
            where nom like '%$nomP%'
            limit $size
            offset $offset";
        
        $requeteCount="select count(*) countP from pionier
            where nom like '%$nomP%'";

    }else{
        $requete="select * from pionier 
            where nom like '%$nomP%' 
            and heureDmd='$heure'
            limit $size
            offset $offset";

            $requeteCount="select count(*) countP from pionier
            where nom like '%$nomP%' and heureDmd='$heure'";
    }
    
    $resultatP=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrPionier=$tabCount['countP'];
    $reste=$nbrPionier % $size;

    if($reste===0)
        $nbrPage=$nbrPionier/$size;
    else
        $nbrPage=floor($nbrPionier/$size)+1;
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>
            GESTION DE PIONIER
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
                   <form method="get" action="pionier.php" class="form-inline">
                       <div class="form-group">
                            <input 
                                   type="text" 
                                   name="nomP" 
                                   placeholder="Taper le categorie de pionier" 
                                   class="form-control" 
                                   value="<?php echo $nomP; ?>">
                        </div>
                       <label for="categorie">Heure demande :</label>
                       <select name="heure" class="form-control" id="categorie" onchange="this.form.submit()">
                           <option value="all" <?php if($heure==="all") echo"selected" ?>>Tout</option>
                           <option value="50" <?php if($heure==="50") echo"selected" ?>>50</option>
                           <option value="60" <?php if($heure==="60") echo"selected" ?>>60</option>
                           <option value="120" <?php if($heure==="120") echo"selected" ?>>120</option>
                       </select>
                       
                       <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-search"></span>Rechercher...
                       </button>
                       &nbsp &nbsp
                       <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                            <a href="newPionnier.php"><span class="glyphicon glyphicon-plus"></span> 
                                Nouveau pionnier
                            </a>
                       <?php } ?>
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Categorie Pionnier(<?php echo $nbrPionier ?> Pionnier(s))</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th>Id pionier</th><th>Nom</th><th>Heure demande</th>
                                <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                    <th>Actions</th>
                                <?php } ?>
                           </tr>
                       </thead>
                       
                       <tbody>
                           
                               <?php while($pionier=$resultatP->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $pionier['id'] ?></td>
                                        <td><?php echo $pionier['nom'] ?></td>
                                        <td><?php echo $pionier['heureDmd'] ?></td>
                                        <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                            <td>
                                                <a 
                                                href="editerPionnier.php?idP=<?php echo $pionier['id'] ?>">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp
                                                <a onclick="return confirm('Etes vous sur de vouloir suprimer cette categorie de pionnier')"
                                                    href="suprimerPionnier.php?idP=<?php echo $pionier['id'] ?>">
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
                                    <a href="pionier.php?page=<?php echo $i; ?>&nomP=<?php echo $nomP ?>&heure=<?php echo $heure ?>">
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