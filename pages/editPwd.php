<?php
    require_once('identifiant.php');
    require_once('connexiondb.php');
?>
<! DOCTYPE HTML>
<HTML>
<head>
        <meta charset="utf-8">
        <title>
            MODIFICATION DE MOT DE PASSE
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../js/monJs.js"></script>

    </head>
    <body>
        <div class="container editPwd-page">
            <h1 class="text-center">Changement du mot de passe</h1>
            <h2 class="text-center">Compte :<?php echo $_SESSION['user']['login'] ?> </h2>

            <form class="form-horizontal" method="post" action="updatePwd.php">
                <div class="input-container">
                    <input
                        minlength="4"
                        class="form-control oldPwd"
                        type="text"
                        name="oldpwd"
                        autocomplete="false"
                        placeholder="Taper votre ancien mot de passe"
                        required
                    >
                    <i class="fa fa-eye fa-2px show-old-pass clickable"></i>
                </div>

                
               
                <div class="input-container">
                    <input
                        minlength="4"
                        class="form-control newPwd"
                        type="password"
                        name="newpwd"
                        autocomplete="false"
                        placeholder="Taper votre nouveau mot de passe"
                        required
                    >
                <i class="fa fa-eye fa-2px show-new-pass clickable"></i>
                </div>
                <input 
                type="submit" 
                value="Enregistrement"
                class="btn btn-primary btn-block"
                />

            </form>
        </div>
    </body>
</HTML>