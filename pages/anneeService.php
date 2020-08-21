<?php
    require_once("connexiondb.php");
    
/*
    if(isset($_GET['nomP']))
        $nomP=$_GET['nomP'];
    else
        $nomP="";
*/
    $annee_predication=isset($_GET['annee_predication'])?$_GET['annee_predication']:"";

    $date_debut=isset($_GET['date_debut'])?$_GET['date_debut']:"all";

    $date_fin=isset($_GET['date_fin'])?$_GET['date_fin']:"";


    $size=isset($_GET['size'])?$_GET['size']:6;

    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset=($page-1)*$size;
    
    //$categorie=$_GET['categorie'];
    if($date_debut=="all"){

        $requete="select * from predication 
            where annee_predication like '%$annee_predication%'
            limit $size
            offset $offset";
        
        $requeteCount="select count(*) countPr from predication
            where annee_predication like '%$annee_predication%'";

    }else{
        $requete="select * from predication 
            where annee_predication like '%$annee_predication%' 
            and date_debut='$date_debut'
            limit $size
            offset $offset";

            $requeteCount="select count(*) countPr from predication
            where annee_predication like '%$annee_predication%' and date_debut='$date_debut'";
    }
    
    $resultatP=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrPredic=$tabCount['countPr'];
    $reste=$nbrPredic % $size;

    if($reste===0)
        $nbrPage=$nbrPredic/$size;
    else
        $nbrPage=floor($nbrPredic/$size)+1;
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
                   <form method="get" action="anneeService.php" class="form-inline">
                       <div class="form-group">
                            <input 
                                   type="text" 
                                   name="annee_predication" 
                                   placeholder="Taper l'annéé de predication" 
                                   class="form-control" 
                                   value="<?php echo $annee_predication; ?>">
                        </div>
                       <!--<label for="categorie">Commence le :</label>
                       <select name="date_debut" class="form-control" id="categorie" onchange="this.form.submit()">
                           <option value="all" <?php// if($heure==="all") echo"selected" ?>>Tout</option>-->
                           <!--<option value="50" <?php //if($heure==="50") echo"selected" ?>>50</option>-->
                           <!--<option value="60" <?php //if($heure==="60") echo"selected" ?>>60</option>
                           <option value="120" <?php //if($heure==="120") echo"selected" ?>>120</option>-->
                      <!-- </select>-->
                       
                       <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-search"></span>Rechercher...
                       </button>
                       &nbsp &nbsp
                       <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                            <a href="newPredication.php"><span class="glyphicon glyphicon-plus"></span>
                                Nouveau pionnier
                            </a>
                       <?php }?>
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Les Annees de service(<?php echo $nbrPredic ?> annéé(s) de service)</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th>Id année de service</th><th>Annee de service</th><th>Debuter le</th><th>Se terminer</th>
                                <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                    <th>Actions</th>
                                <?php }?>
                           </tr>
                       </thead>
                       
                       <tbody>
                           
                               <?php while($predication=$resultatP->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $predication['id'] ?></td>
                                        <td><?php echo $predication['annee_predication'] ?></td>
                                        <td><?php echo $predication['date_debut'] ?></td>
                                        <td><?php echo $predication['date_fin'] ?></td>
                                        <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                            <td>
                                                <a 
                                                href="editerPredication.php?idP=<?php echo $predication['id'] ?>">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp
                                                <a onclick="return confirm('Etes vous sur de vouloir suprimer cet annéé de service')"
                                                    href="suprimerPredication.php?idP=<?php echo $predication['id'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
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
                                    <a href="anneeService.php?=<?php echo $i; ?>&annee_predication=<?php echo $annee_predication ?>&date_debut=<?php echo $date_debut ?>">
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