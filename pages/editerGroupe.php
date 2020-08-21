<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $idG=isset($_GET['idG'])?$_GET['idG']:0;
    $requete="select * from groupe where id=$idG";
    $resultat=$pdo->query($requete);
    $groupe=$resultat->fetch();
    $nomG=$groupe['nom'];
    $idProcla=$groupe['idProclamateur'];
   // $heure=strtolower($pionnier['heureDmd']);

   $requeteP="select * from proclamateur where civilite='M'";
    $resultatP=$pdo->query($requeteP);
?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Editer les groupes
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition le groupe de predication</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="updateGroupe.php" class="form">
                        <div class="form-group">
                           <label for="categorie">Id :<?php echo $idG ?></label>
                            <input 
                                   type="hidden" 
                                   name="idG" 
                                   class="form-control" 
                                   value="<?php echo $idG ?>"
                           />
                        </div>
                        
                       <div class="form-group">
                           <label for="categorie">Nom :</label>
                            <input 
                                   type="text" 
                                   name="nomG" 
                                   placeholder="Taper le categorie de pionier" 
                                   class="form-control" 
                                   value="<?php echo $nomG ?>"
                            />
                        </div>
                        <div class="form-group">
                           <label for="categorie">Chef du groupe :</label>
                           <select name="idProclamateur" class="form-control" id="idProclamateur">
                                <?php while($proclamateur=$resultatP->fetch()){ ?>
                                    <option value="<?php echo  $proclamateur['id'] ?>" 
                                        <?php if($idProcla===$proclamateur['id']) echo "selected" ?> >
                                        <?php echo  $proclamateur['postnom'] ?>
                                    </option>
                                <?php } ?>
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