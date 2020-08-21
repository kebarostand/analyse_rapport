<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
    $idP=isset($_GET['idP'])?$_GET['idP']:0;
    $requete="select * from proclamateur where id=$idP";
    $resultat=$pdo->query($requete);
    $proclamateur=$resultat->fetch();
    $nom=$proclamateur['nom'];
    $postnom=$proclamateur['postnom'];
    $prenom=$proclamateur['prenom'];
    $civilite= strtoupper($proclamateur['civilite']);
    $telephone=$proclamateur['telephone'];
    $email=$proclamateur['email'];
    $idBapteme=$proclamateur['idBapteme'];
    $idPionier=$proclamateur['idPionier'];
    $idGroupe=$proclamateur['idGroupe'];
    //$heure=strtolower($pionnier['heureDmd']);

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
            Editer un proclamateur
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Editer le proclamateur</div>
                
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
                            <input 
                                   type="text" 
                                   name="nom" 
                                   class="form-control" 
                                   value="<?php echo $nom ?>"
                            />
                        </div>
                        <div class="form-group">
                           <label for="postnom">Post-nom :</label>
                           <input 
                                   type="text" 
                                   name="postnom" 
                                   class="form-control" 
                                   value="<?php echo $postnom ?>"
                            />
                       </div>
                       <div class="form-group">
                           <label for="prenom">Prenom :</label>
                           <input 
                                   type="text" 
                                   name="prenom" 
                                   class="form-control" 
                                   value="<?php echo $prenom ?>"
                            />
                       </div>
                       <div class="form-group">
                           <label for="civilite">Civilité :</label>
                           <div class="radio">
                                <label><input 
                                        type="radio" 
                                        name="civilite" 
                                        value="F"
                                        <?php if($civilite==="F")echo "checked" ?> checked
                                    /> F </label><br>
                                <label><input 
                                        type="radio" 
                                        name="civilite" 
                                        value="M"
                                        <?php if($civilite==="M")echo "checked" ?>
                                    /> M</label>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="telephone">telephone :</label>
                           <input 
                                   type="text" 
                                   name="telephone" 
                                   class="form-control" 
                                   value="<?php echo $telephone ?>"
                            />
                       </div>
                       <div class="form-group">
                           <label for="email">E-mail :</label>
                           <input 
                                   type="text" 
                                   name="email" 
                                   class="form-control" 
                                   value="<?php echo $email ?>"
                            />
                       </div>
                       <div class="form-group">
                            <label for="idBapteme">Date du bapteme: </label>
                            <select name="idBapteme" class="form-control" id="idBapteme">
                                <?php while($bapteme=$resultatB->fetch()){ ?>
                                    <option value="<?php echo  $bapteme['id'] ?>" 
                                        <?php if($idBapteme===$bapteme['id']) echo "selected" ?> >
                                        <?php echo  $bapteme['lieu'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="idPionnier">Pionnier: </label>
                            <select name="idPionnier" class="form-control" id="idPionnier">
                                <?php while($pionnier=$resultatP->fetch()){ ?>
                                    <option value="<?php echo $pionnier['id'] ?>" 
                                        <?php if($idPionier===$pionnier['id'])echo "selected" ?>>
                                        <?php echo $pionnier['nom'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                       </div>
                       <div class="form-group">
                            <label for="idGroupe">Groupe: </label>
                            <select name="idGroupe" class="form-control" id="idGroupe">
                                <?php while($groupe=$resultatG->fetch()){ ?>
                                    <option value="<?php echo $groupe['id'] ?>"
                                        <?php if($idGroupe==$groupe['id']) echo "selected"?>>
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