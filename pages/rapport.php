<?php
   require_once('identifiant.php');

    require_once("connexiondb.php");
    
/*
    if(isset($_GET['nomP']))
        $nomP=$_GET['nomP'];
    else
        $nomP="";
*/
    $idProclamateur=isset($_GET['idProclamateur'])?$_GET['idProclamateur']:"";
    $idPredication=isset($_GET['idPredication'])?$_GET['idPredication']:"";
    $periodique=isset($_GET['periodique'])?$_GET['periodique']:"";
    $video=isset($_GET['video'])?$_GET['video']:"";
    $heure=isset($_GET['heure'])?$_GET['heure']:"";
    $nouvel_visite=isset($_GET['nouvel_visite'])?$_GET['nouvel_visite']:"";
    $etude_bublique=isset($_GET['etude_bublique'])?$_GET['etude_bublique']:"";
    $mois=isset($_GET['mois'])?$_GET['mois']:"";

    $size=isset($_GET['size'])?$_GET['size']:6;

    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset=($page-1)*$size;
    
    
    $requete="SELECT * FROM vprecher  
         where mois like '%$mois%'
        limit $size
        offset $offset";
        
    $requeteCount="select count(*) countP from vprecher
        where mois like '%$mois%'";

    
    
    $resultatP=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrPr=$tabCount['countP'];
    $reste=$nbrPr % $size;

    if($reste===0)
        $nbrPage=$nbrPr/$size;
    else
        $nbrPage=floor($nbrPr/$size)+1;
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>
            GESTION DE RAPPORT
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
                                   placeholder="Taper le mois du rapport" 
                                   class="form-control" 
                                   value="<?php echo $mois; ?>">
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
                            <a href="newRapport.php">
                                <span class="glyphicon glyphicon-plus"></span>

                                    Nouveau Rapport

                            </a>
                       <?php }?>
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">le(s) Rapport(s)(<?php echo $nbrPr ?> Rapport(s))</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th>Id</th><th>Nom</th><th>Annee</th><th>periodique</th><th>video</th><th>heure</th><th>nouvel_visite</th><th>etude_bublique</th><th>mois</th>
                                <?php if($_SESSION['user']['role']=='ADMIN') {?>
                                    <th>Actions</th>
                                <?php } ?>
                           </tr>
                       </thead>
                       
                       <tbody>
                           
                               <?php while($precher=$resultatP->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $precher['id'] ?></td>
                                        <td><?php echo $precher['Nom'] ?></td>
                                        <td><?php echo $precher['Annee'] ?></td>
                                        <td><?php echo $precher['Periodique'] ?></td>
                                        <td><?php echo $precher['Video'] ?></td>
                                        <td><?php echo $precher['Heure'] ?></td>
                                        <td><?php echo $precher['NV'] ?></td>
                                        <td><?php echo $precher['EB'] ?></td>
                                        <td><?php echo $precher['Mois'] ?></td>
                                        
                                        <?php if($_SESSION['user']['role']=='ADMIN') {?>
                                            <td>
                                                <a 
                                                href="editerRapport.php?idP=<?php echo $precher['id'] ?>">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp
                                                <a onclick="return confirm('Etes vous sur de vouloir suprimer cette categorie de pionnier')"
                                                    href="suprimerRappot.php?idP=<?php echo $precher['id'] ?>">
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
                                    <a href="rapport.php?page=<?php echo $i; ?>&mois=<?php echo $mois ?>">
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