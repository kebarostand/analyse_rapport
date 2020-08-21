<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Nouvelle date de bapteme
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Veuillez saisi les données de la nouvelle date de bapteme</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="insertBapteme.php" class="form">
                    <div class="form-group">
                           <label for="categorie">Assamble:</label>
                           <select name="assamble" class="form-control" id="assamble">
                                    <option value="Assemble special avec le representant de la filiale" >
                                        Assemble special avec le representant de la filiale
                                    </option>
                                    <option value="Assemble special avec le surveillant de circo" >
                                        Assemble special avec le surveillant de circo
                                    </option>
                                    <option value="Assemble regional " >
                                        Assemble regional
                                    </option>
                            </select>
                       </div>
                       <div class="form-group">
                           <label for="categorie">date du bapteme :</label>
                            <input 
                                   type="date" 
                                   name="dateBapteme" 
                                   placeholder="" 
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