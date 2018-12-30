<?php

    include_once "../models/equipe_coureur.php" ;
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
        <div class="container"> 
            <h3 style="color : #0066ff ;"> 
        AJOUT D'UNE EQUIPE</h3> 
            <hr> 
            <section class=""> 
                <form class='form' action="../controleurs/addTeam.php" method="post">
                    <div class="form-group">
                        <label for="teamName" >
                            NOM DE L'EQUIPE
                        </label>
                        <br>
                        <input class="form-control" id="teamName" type="text" 
                               required
                               placeholder="Saisir le nom de l'équipe" name="teamName">
                    </div>
                    <button type="submit" class='btn btn-info'> VALIDER </button>
                </form>
            </section>             
    
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