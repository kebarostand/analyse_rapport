<?php
    require_once('identifiant.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand">Gestion des rapports</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="proclamateur.php">les proclamateurs</a> </li>
            <li><a href="anneeService.php"> Années de service</a></li>
            <li><a href="groupe.php"> Groupes</a></li>
            <li><a href="pionier.php"> Categorie de pionier</a></li>
            <li><a href="bapteme.php"> Date de bapteme</a></li>
            <li><a href="rapport.php"> Rapports</a></li>
            <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                <li><a href="utilisateur.php"> Utilisateurs</a></li>
            <?php } ?>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['id'] ?> "><i class="glyphicon glyphicon-user"> </i> 
                <?php echo ' '.$_SESSION['user']['login'] ?> 
            </a> </li>
            <li><a href="seDeConnecter.php"><i class="glyphicon glyphicon-log-out"> </i> Se deconnecter</a></li>
        </ul>



    </div>
</nav> 