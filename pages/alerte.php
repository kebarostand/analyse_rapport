<?php
     require_once('identifiant.php');
    $message=isset($_GET['message'])?($_GET['message']):"Erreur";
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charcet="utf-8">
        <title>
            Alerte
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">

    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-danger margetop">
                <div class="panel-heading">Erreur</div>
                <div class="panel-body">
                    <h3> <?php echo $message; ?> </h3>
                    <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour >>> </a></h4> 
                </div>
            </div>
        </div>
        
    </body>
</HTML>