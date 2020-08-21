<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $idP=isset($_GET['idP'])?$_GET['idP']:0;
    $requete="select * from predication where id=$idP";
    $resultat=$pdo->query($requete);
    $predication=$resultat->fetch();
    $annee_predication=$predication['annee_predication'];
    $date_debut=$predication['date_debut'];
    $date_fin=$predication['date_fin'];
   // $heure=strtolower($pionnier['heureDmd']);
?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Editer annéé de service
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de l'annéé de service</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="updatePredication.php" class="form">
                        <div class="form-group">
                           <label for="categorie">Id :<?php echo $idP ?></label>
                            <input 
                                   type="hidden" 
                                   name="idP" 
                                   class="form-control" 
                                   value="<?php echo $idP ?>"
                           />
                        </div>
                        
                       <div class="form-group">
                           <label for="categorie">Nom :</label>
                            <input 
                                   type="text" 
                                   name="annee_predication" 
                                   placeholder="Taper l'annéé de service" 
                                   class="form-control" 
                                   value="<?php echo $annee_predication ?>"
                            />
                        </div>
                        <div class="form-group">
                           <label for="categorie">Debuter le :</label>
                           <input 
                                   type="date" 
                                   name="date_debut" 
                                   class="form-control" 
                                   value="<?php echo $date_debut ?>"
                            />
                       </div>
                       <div class="form-group">
                           <label for="categorie">Se terminer le :</label>
                           <input 
                                   type="date" 
                                   name="date_fin" 
                                   class="form-control" 
                                   value="<?php echo $date_fin ?>"
                            />
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