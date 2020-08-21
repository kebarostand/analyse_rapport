<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $idP=isset($_GET['idP'])?$_GET['idP']:0;

    $requete="select * from precher where id=$idP";
    $resultat=$pdo->query($requete);
    $rapport=$resultat->fetch();

    $idProclamateur=$rapport['idProclamateur'];
    $idPredication=$rapport['idPredication'];
    $periodique=$rapport['periodique'];
    $video=$rapport['video'];
    $heure=$rapport['heure'];
    $nouvel_visite=$rapport['nouvel_visite'];
    $etude_bublique=$rapport['etude_bublique'];
    $mois=$rapport['mois'];
   // $heure=strtolower($pionnier['heureDmd']);


   $requeteP="select * from proclamateur";
    $resultatP=$pdo->query($requeteP);

    $requetePre="select * from predication";
    $resultatPre=$pdo->query($requetePre);

?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Editer le rapport de service
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition du rapport de service</div>
                
                <div class="panel-body">
                    
                <form method="post" action="updateProclamateur.php" class="form" >
                        <div class="form-group">
                           <label for="id">Id :<?php echo $idP ?></label>
                            <input 
                                   type="hidden" 
                                   name="idP" 
                                   class="form-control" 
                                   value="<?php echo $idP ?>"
                           />
                        </div>
                        
                       <div class="form-group">
                           <label for="nom">Nom :</label>
                           <select name="idProclamateur" class="form-control" id="idProclamateur">
                                <?php while($proclamateur=$resultatP->fetch()){ ?>
                                    <option value="<?php echo  $proclamateur['id'] ?>" 
                                        <?php if($idProclamateur===$proclamateur['id']) echo "selected" ?> >
                                        <?php echo  $proclamateur['postnom'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                           <label for="annee">Annee de service :</label>
                           <select name="idPredication" class="form-control" id="idPredication">
                                <?php while($predic=$resultatPre->fetch()){ ?>
                                    <option value="<?php echo  $predic['id'] ?>" >
                                        <?php echo  $predic['annee_predication'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                       </div>
                       <div class="form-group">
                           <label for="periodique">Periodique :</label>
                           <input 
                                   type="text" 
                                   name="periodique" 
                                   class="form-control" 
                                   value="<?php echo  $rapport['periodique'] ?>"
                            />
                       </div>
                       <div class="form-group">
                           <label for="video">Video :</label>
                           <input 
                                   type="text" 
                                   name="video" 
                                   class="form-control" 
                                   value="<?php echo  $rapport['video'] ?>"
                            />
                       </div>
                       <div class="form-group">
                           <label for="heure">Heure :</label>
                           <input 
                                   type="text" 
                                   name="heure" 
                                   class="form-control"
                                   value="<?php echo  $rapport['heure'] ?>"
                                   required
                            />
                       </div>
                       
                       <div class="form-group">
                           <label for="nouvel_visite">Nouvel Visite :</label>
                           <input 
                                   type="text" 
                                   name="nouvel_visite" 
                                   class="form-control"
                                   value="<?php echo  $rapport['nouvel_visite'] ?>" 
                            />
                       </div>
                       <div class="form-group">
                           <label for="etude_bublique"> Etude bublique :</label>
                           <input 
                                   type="text" 
                                   name="etude_bublique" 
                                   class="form-control" 
                                   value="<?php echo  $rapport['etude_bublique'] ?>" 
                            />
                       </div>
                       <div class="form-group">
                           <label for="mois"> Mois :</label>
                           <select name="mois" class="form-control" id="mois" >
                               <option value="Janvier" <?php if($mois==="Janvier")echo "selected" ?> >Janvier</option>
                               <option value="Fevrier" <?php if($mois==="Fevrier")echo "selected" ?>>Fevrier</option>
                               <option value="Mars" <?php if($mois==="Mars")echo "selected" ?>>Mars</option>
                               <option value="Avril" <?php if($mois==="Avril")echo "selected" ?>>Avril</option>
                               <option value="Mai" <?php if($mois==="Mai")echo "selected" ?>>Mai</option>
                               <option value="Juin" <?php if($mois==="Juin")echo "selected" ?>>Juin</option>
                               <option value="Juillet" <?php if($mois==="Juillet")echo "selected" ?>>Juillet</option>
                               <option value="Aout" <?php if($mois==="Aout")echo "selected" ?>>Aout</option>
                               <option value="Septembre" <?php if($mois==="Septembre")echo "selected" ?>>Septembre</option>
                               <option value="Octobre" <?php if($mois==="Octobre")echo "selected" ?>>Octobre</option>
                               <option value="Novembre" <?php if($mois==="Novembre")echo "selected" ?>>Novembre</option>
                               <option value="Decembre" <?php if($mois==="Decembre")echo "selected" ?>>Décembre</option>
                           </select>
                       </div>
                       
                       <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-save"></span>Enregistrer
                       </button>
                     </form>
                    
                </div>
                
            </div>
        </div>
        
    </body>
</HTML>