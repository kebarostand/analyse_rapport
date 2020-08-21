<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $idP=isset($_GET['idP'])?$_GET['idP']:0;
    $requete="select * from pionier where id=$idP";
    $resultat=$pdo->query($requete);
    $pionnier=$resultat->fetch();
    $nomP=$pionnier['nom'];
    $heure=$pionnier['heureDmd'];
   // $heure=strtolower($pionnier['heureDmd']);
?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Editer pionnier
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de la categorie pionnier</div>
                
                <div class="panel-body">
                    
                    <form method="post" action="updatePionnier.php" class="form">
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
                                   name="nomP" 
                                   placeholder="Taper le categorie de pionier" 
                                   class="form-control" 
                                   value="<?php echo $nomP ?>"
                            />
                        </div>
                        <div class="form-group">
                           <label for="categorie">Heure demande :</label>
                           <select name="heure" class="form-control" id="categorie" >
                               <option value="50" <?php if($heure=="50")echo "selected" ?> >50</option>
                               <option value="60" <?php if($heure=="60")echo "selected" ?>>60</option>
                               <option value="100" <?php if($heure=="100")echo "selected" ?>>100</option>
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