<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    
    $requeteB="select * from bapteme";
    $resultatB=$pdo->query($requeteB);

    $requeteP="select * from pionier";
    $resultatP=$pdo->query($requeteP);

    $requeteG="select * from groupe";
    $resultatG=$pdo->query($requeteG);

?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            nouveau proclamateur
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Les ifos du nouveau proclamateur</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="insertProclamateur.php" class="form" >
                        
                        
                       <div class="form-group">
                           <label for="nom">Nom :</label>
                            <input 
                                   type="text" 
                                   name="nom" 
                                   class="form-control" 
                            />
                        </div>
                        <div class="form-group">
                           <label for="postnom">Post-nom :</label>
                           <input 
                                   type="text" 
                                   name="postnom" 
                                   class="form-control"
                            />
                       </div>
                       <div class="form-group">
                           <label for="prenom">Prenom :</label>
                           <input 
                                   type="text" 
                                   name="prenom" 
                                   class="form-control" 
                            />
                       </div>
                       <div class="form-group">
                           <label for="civilite">Civilité :</label>
                           <div class="radio">
                                <label><input 
                                        type="radio" 
                                        name="civilite" 
                                        value="F"
                                         checked
                                    /> F </label><br>
                                <label><input 
                                        type="radio" 
                                        name="civilite" 
                                        value="M"
                                    /> M</label>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="telephone">telephone :</label>
                           <input 
                                   type="text" 
                                   name="telephone" 
                                   class="form-control"
                            />
                       </div>
                       <div class="form-group">
                           <label for="email">E-mail :</label>
                           <input 
                                   type="text" 
                                   name="email" 
                                   class="form-control" 
                            />
                       </div>
                       <div class="form-group">
                            <label for="idBapteme">Date du bapteme: </label>
                            <select name="idBapteme" class="form-control" id="idBapteme">
                                <?php while($bapteme=$resultatB->fetch()){ ?>
                                    <option value="<?php echo  $bapteme['id'] ?>" >
                                        <?php echo  $bapteme['lieu'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="idPionnier">Pionnier: </label>
                            <select name="idPionnier" class="form-control" id="idPionnier">
                                <?php while($pionnier=$resultatP->fetch()){ ?>
                                    <option value="<?php echo $pionnier['id'] ?>">
                                        <?php echo $pionnier['nom'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="idGroupe">Groupe: </label>
                            <select name="idGroupe" class="form-control" id="idGroupe">
                                <?php while($groupe=$resultatG->fetch()){ ?>
                                    <option value="<?php echo $groupe['id'] ?>">
                                        <?php echo $groupe['nom'] ?>
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