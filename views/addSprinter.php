<?php
    include_once "../models/equipe.php" ;
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
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->         
    </head>     
    <body data-spy="scroll" data-target="nav">

    <?php
        // nav bar
        include_once "navCompenent.php";
    ?>

        <div class="container">
            <h3 class="" style="color : #0066ff ;">
                AJOUT DES COUREURS </h3>
            <hr>
            <div>
                <form class="form" action="../controleurs/add_sprinter.php" method="post">
                    <div class="form-group">
                        <label for="sprinterName" >
                            NOM DU COUREUR
                        </label>
                        <br>
                        <input class="form-control" id="sprinterName" type="text" placeholder="Saisir le nom du coureur" name="sprinterName">
                    </div>
                    <div class="form-group">
                        <label for="sprinterFirstName" >
                            PRENOM DU COUREUR
                        </label>
                        <br>
                        <input class="form-control" id="sprinterFirstName" type="text" placeholder="Saisir le prénom du coureur" name="sprinterFirstName">
                    </div>
                    <div class="form-group">
                        <label for="sprinterFirstName" >
                            CHOIX DE L'EQUIPE
                        </label>
                        <?php $Team = getAllTeam() ; ?>
                        <select name='idTeam' class='form-control' required >
                            <?php 
                                foreach ( $Team  as $team ){
                            ?>
                                <option value="<?= $team['id_equipe']?>" ><?=$team['nom_equipe'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                        
                    <hr>
                    <input type="submit" value="AJOUTER" class="btn btn-info">
                </form>                 
            </div>

            <?php
                include_once "addChampcompenent.php";
            ?>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>         
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/bskit-scripts.js"></script>         
    </body>     
</html>
