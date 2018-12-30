<?php
    include_once '../models/connexion.php';
    if( !is_logged() ) {
        echo "hello" ;
        //die() ;
        //header("Location:../") ;
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
        <style>
            .icoBt:hover{
                color: green  !important;
            }
        </style>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>


    <![endif]-->         
    </head>     
    <body data-spy="scroll" data-target="nav">
        <?php

        // NAV BAR /////////////////////
        include_once "navCompenent.php" ;
    ?>
    <div class="container orange">
            <h3 style="color : #0066ff ;">
                Liste des championnats </h3>
            <hr>
            <section class="">
                <?php
                            include_once("../models/gestion_championat.php");
                            $championats = get_all_championat();
                            foreach ($championats as $championat) {
                            ?>
                            <div class="white well row" style="background-color : #0066ff ;">
                                <div class="col col-md-8">
                                    <h4><?=$championat['nom_championat']." ".$championat['date_creation']?></h4>
                                </div>
                                <div class="col col-md-4">
                                    <button class="linkBtn"
                                            onclick="window.location = 'championshipResult.php?id=<?=$championat['id_championat']?>';"
                                            data-toggle="tooltip" data-placement="bottom" title="Afficher les résultats"
                                            style="background : none ; border : none ;">
                                        <i class="fa fa-2x icoBt fa-trophy"></i>
                                    </button>
                                    &nbsp;
                                    <button class="linkBtn"
                                    onclick="window.location = 'imprimer.php?id=<?=$championat['id_championat']?>';"
                                            data-toggle="tooltip" data-placement="bottom" title="Imprimer resultats"
                                            style="background : none ; border : none ;">
                                        <i class="fa fa-file-text fa-2x icoBt"></i>
                                    </button>
                                    &nbsp; 
                                    <button class="linkBtn"
                                            onclick="window.location = 'championshipSprint.php?id=<?=$championat['id_championat']?>';"
                                            data-toggle="tooltip" data-placement="bottom" title="Afficher les courses"
                                            style="background : none ; border : none ;">
                                        <i class="fa fa-bicycle fa-2x icoBt"></i>
                                    </button>
                                    &nbsp;
                                    <button class="linkBtn"
                                            onclick="window.location = 'championshipSprinter.php?id=<?=$championat['id_championat']?>';"
                                            data-toggle="tooltip" data-placement="bottom" title="Liste des participants"
                                            style="background : none ; border : none ;">
                                        <i class="fa fa-user fa-2x icoBt"></i>
                                    </button>
                                    &nbsp;
                                    <button class="linkBtn"
                                            onclick="window.location = 'championshipTeam.php?id=<?=$championat['id_championat']?>';"
                                            data-toggle="tooltip" data-placement="bottom" title="Liste des equipes"
                                            style="background : none ; border : none ;">
                                        <i class="fa fa-users fa-2x icoBt"></i>
                                    </button>
                                </div>
                            </div>  
                        <?php
                        }
                        ?>
            </section>
            <!-- Modal -->
            <a href="championshipResult.php"></a>
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

