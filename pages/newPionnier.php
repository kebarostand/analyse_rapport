<?php
    require_once('identifiant.php');
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Nouvel pionnier
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Veuillez saisi les données de la nouvelle categorie pionnier</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="insertPionnier.php" class="form">
                       <div class="form-group">
                           <label for="categorie">Nom :</label>
                            <input 
                                   type="text" 
                                   name="nomP" 
                                   placeholder="Taper le categorie de pionier" 
                                   class="form-control" 
                            >
                        </div>
                        <div class="form-group">
                           <label for="categorie">Heure demande :</label>
                           <select name="heure" class="form-control" id="categorie" >
                               <option value="50" selected>50</option>
                               <option value="60">60</option>
                               <option value="100">100</option>
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