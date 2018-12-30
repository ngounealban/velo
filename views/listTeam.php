<?php
    include_once "../models/connexion.php" ;
    include_once "../models/equipe.php" ;
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
    </head>     
    <body data-spy="scroll" data-target="nav"> 
        <?php
    //NAV BAR
    include_once "navCompenent.php";
?> 
        <div class="container"> 
            <h3 style="color : #0066ff ;"> 
                LISTES DES EQUIPES
            </h3> 
            <hr> 
            <section class=""> 
            
                <?php
                            include_once("../models/gestion_coureur.php");
                            $Team = getAllTeam();
                            foreach ( $Team as $team ) {
                            ?>
                             <div class="white well row" style="background-color : #0066ff ;">
                                <div class="col col-md-8">
                                    <h4><?= $team['nom_equipe'] ?></h4>
                                </div>
                                <div class="col col-md-4">
                                    <button class="linkBtn" style="background : none ; border : none ;" onclick="window.location = 'setTeam.php?idt=<?=$team['id_equipe']?>';">
                                        <i class="fa fa-2x icoBt fa-pencil"></i>
                                    </button> &nbsp; &nbsp;  &nbsp; 
                                    <button class="linkBtn" style="background : none ; border : none ;" onclick="window.location = '../controleurs/deleteTeam.php?idt=<?=$team['id_equipe']?>';">
                                        <i class="fa fa-2x icoBt fa-bitbucket"></i>
                                    </button>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

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