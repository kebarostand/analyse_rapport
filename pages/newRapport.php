<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    
    $requetePro="select * from proclamateur";
    $resultatPro=$pdo->query($requetePro);

    $requetePre="select * from predication";
    $resultatPre=$pdo->query($requetePre);


?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Nouveau Rapport
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/js/bootstrap.min..js"></script>

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Nouveau Rapport</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="insertRapport.php" class="needs-validation" >
                        
                        
                       <div class="form-group">
                           <label for="nom">Nom :</label>
                           <select name="idProclamateur" class="form-control" id="idProclamateur">
                                <?php while($proclamateur=$resultatPro->fetch()){ ?>
                                    <option value="<?php echo  $proclamateur['id'] ?>" >
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
                            />
                       </div>
                       <div class="form-group">
                           <label for="video">Video :</label>
                           <input 
                                   type="text" 
                                   name="video" 
                                   class="form-control" 
                            />
                       </div>
                       <div class="form-group">
                           <label for="heure">Heure :</label>
                           <input 
                                   type="text" 
                                   name="heure" 
                                   class="form-control"
                                   required
                            />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                       </div>
                       
                       <div class="form-group">
                           <label for="nouvel_visite">Nouvel Visite :</label>
                           <input 
                                   type="text" 
                                   name="nouvel_visite" 
                                   class="form-control" 
                            />
                       </div>
                       <div class="form-group">
                           <label for="etude_bublique"> Etude bublique :</label>
                           <input 
                                   type="text" 
                                   name="etude_bublique" 
                                   class="form-control" 
                            />
                       </div>
                       <div class="form-group">
                           <label for="mois"> Mois :</label>
                           <select name="mois" class="form-control" id="mois" >
                               <option value="Janvier" selected>Janvier</option>
                               <option value="Fevrier">Fevrier</option>
                               <option value="Mars">Mars</option>
                               <option value="Avril">Avril</option>
                               <option value="Mai">Mai</option>
                               <option value="Juin">Juin</option>
                               <option value="Juillet">Juillet</option>
                               <option value="Aout">Aout</option>
                               <option value="Septembre">Septembre</option>
                               <option value="Octobre">Octobre</option>
                               <option value="Novembre">Novembre</option>
                               <option value="Decembre">Décembre</option>
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