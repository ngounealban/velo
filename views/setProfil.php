<?php
    include_once "../models/profil.php" ;
    include_once '../models/connexion.php';
    if( !is_logged() ) {
        header("Location:../") ;
    }
?>

<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <meta charset="utf-8">
    <title>BikeApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="pinegrow, blocks, bootstrap" />
    <meta name="description" content="My new website" />
    <link rel="shortcut icon" href="ico/favicon.png">
    <!-- Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style Library -->
    <link href="css/style-library-1.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/blocks.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <style>.icoBt:hover {
            color: green  !important;
        }</style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>


    <![endif]-->
</head>
<body data-spy="scroll" data-target="nav">
<?php
//NAV BAR
include_once "navCompenent.php";
?>
<div class="container" style="color: #0066ff ;">
    <h3 style="color: #0066ff ;">
        MODIFIER PROFIL </h3>
    <hr>
    <div class="row">
        <div class="col col-log-8">
            <?php 
                $password = getPassword() ;
            ?>
            <form action="../controleurs/setProfil.php" method="post" >
                <div class="form-group">
                    <h4>Modifier le mot de passe</h4>
                    <input type="password" 
                           class="form-control"
                           value="<?= $password['nom_championat'] ?>" name="password" >
                </div>
                <div class="form-group">
                    <h4>Confirmer le mot de passe</h4>
                    <input type="password" 
                           class="form-control"
                           value="<?= $password['nom_championat'] ?>" name="confirmPassword" >
                </div>
                <button type="submit" class="btn btn-info">VALIDER</button>
                    
            </form>
            
            
        </div>
    </div>
    <!-- Modal -->
    <?php
    include_once "addChampcompenent.php" ;
    ?>
</div>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/bskit-scripts.js"></script>
</body>
</html>