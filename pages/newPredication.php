<?php
    require_once('identifiant.php');
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Nouvelle annéé de service
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Veuillez saisi les donnée de la nouvelle annéé de sevice</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="insertPredication.php" class="form">
                       <div class="form-group">
                           <label for="categorie">Designation :</label>
                            <input 
                                   type="text" 
                                   name="annee_predication" 
                                   placeholder="Taper l'annéé de service" 
                                   class="form-control" 
                            >
                        </div>
                        <div class="form-group">
                           <label for="categorie">Debuter le :</label>
                           <input 
                                   type="date" 
                                   name="date_debut" 
                                   class="form-control" 
                            >
                       </div>
                       <div class="form-group">
                           <label for="categorie">Se terminer le :</label>
                           <input 
                                   type="date" 
                                   name="date_fin" 
                                   class="form-control" 
                            >
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