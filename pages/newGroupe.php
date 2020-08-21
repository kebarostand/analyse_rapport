<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

    $requeteP="select * from proclamateur where civilite='M'";
    $resultatP=$pdo->query($requeteP);
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Nouvel groupe
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Veuillez saisi les données du nouveaux groupe de predication</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="insertGoupe.php" class="form">
                       <div class="form-group">
                           <label for="categorie">Nom du groupe:</label>
                            <input 
                                   type="text" 
                                   name="nomG" 
                                   placeholder="Taper le nom du groupe" 
                                   class="form-control" 
                            >
                        </div>
                        <div class="form-group">
                           <label for="categorie">chef du groupe:</label>
                           <select name="idProclamateur" class="form-control" id="idProclamateur">
                                <?php while($proclamateur=$resultatP->fetch()){ ?>
                                    <option value="<?php echo  $proclamateur['id'] ?>" >
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