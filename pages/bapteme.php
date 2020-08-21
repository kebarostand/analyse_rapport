<?php
    require_once("connexiondb.php");
    
/*
    if(isset($_GET['nomP']))
        $nomP=$_GET['nomP'];
    else
        $nomP="";
*/
    $assemble=isset($_GET['assemble'])?$_GET['assemble']:"";

    $size=isset($_GET['size'])?$_GET['size']:6;

    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset=($page-1)*$size;
    
    //$categorie=$_GET['categorie'];
    
    $requete="select * from bapteme 
            where assamble like '%$assemble%' 
            limit $size
            offset $offset";

    $requeteCount="select count(*) countBapteme from bapteme
            where assamble like '%$assemble%'";
    
    
    $resultatB=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrB=$tabCount['countBapteme'];
    $reste=$nbrB % $size;

    if($reste===0)
        $nbrPage=$nbrB/$size;
    else
        $nbrPage=floor($nbrB/$size)+1;
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>
            GESTION DE GROUPE
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Rechercher...</div>
                <div class="panel-body">
                   <form method="get" action="bapteme.php" class="form-inline">
                       <div class="form-group">
                            <input 
                                   type="text" 
                                   name="assemble" 
                                   placeholder="Taper l'assemble" 
                                   class="form-control" 
                                   value="<?php echo $assemble; ?>">
                        </div>
                       <!--<label for="categorie">Commence le :</label>
                       <select name="date_debut" class="form-control" id="categorie" onchange="this.form.submit()">
                           <option value="all" <?php// if($heure==="all") echo"selected" ?>>Tout</option>-->
                           <!--<option value="50" <?php //if($heure==="50") echo"selected" ?>>50</option>-->
                           <!--<option value="60" <?php //if($heure==="60") echo"selected" ?>>60</option>
                           <option value="120" <?php //if($heure==="120") echo"selected" ?>>120</option>-->
                      <!-- </select>-->
                       
                       <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-search"></span>Rechercher...
                       </button>
                       &nbsp &nbsp
                       <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                            <a href="newBapteme.php"><span class="glyphicon glyphicon-plus"></span> 
                            Nouveau date de bapteme
                            </a>
                       <?php }?>
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Les dates de bapteme(<?php echo $nbrB ?> date(s) de bapteme)</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                                <th>Id du bapteme</th><th>assemble</th><th>date du bapteme</th><th>Lieu</th>
                                <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                    <th>Actions</th>
                                <?php } ?>
                           </tr>
                       </thead>
                       
                       <tbody>
                           
                               <?php while($bapteme=$resultatB->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $bapteme['id'] ?></td>
                                        <td><?php echo $bapteme['assamble'] ?></td>
                                        <td><?php echo $bapteme['date_bapteme'] ?></td>
                                        <td><?php echo $bapteme['lieu'] ?></td>
                                        <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                                            <td>
                                                <a 
                                                href="editerBapteme.php?idB=<?php echo $bapteme['id'] ?>">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp
                                                <a onclick="return confirm('Etes vous sur de vouloir suprimer cet annéé de service')"
                                                    href="suprimerBapteme.php?idB=<?php echo $bapteme['id'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                                
                                            </td>
                                        <?php }?>
                                    </tr>
                               <?php } ?>
                           
                       </tbody>
                   </table>
                    
                    <div>
                        <ul class="nav nav-pills">
                            <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                                <li class="<?php if($i==$page) echo'active' ?>"> 
                                    <a href="bapteme.php?page=<?php echo $i; ?>">
                                        Page <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</HTML>