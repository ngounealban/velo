<?php
    include_once '../models/gestion_coureur.php' ;
    include_once '../models/equipe.php' ;
    include_once '../models/equipe_coureur.php' ;
    include_once '../models/connexion.php';
    if( !is_logged() ) {
        header("Location:../") ;
    }
    
    if( isset ( $_GET[ 'idS'] ) ){
        if( count(get_coureur( $_GET['idS'] ) ) ) {
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
                        .icoBt:hover {
                            color: green  !important;
                        }
                    </style>         
                </head>     
                <body data-spy="scroll" data-target="nav"> 
                    <?php
                //NAV BAR
                include_once "navCompenent.php";
            ?> 
                    <?php $sprinter = get_coureur(  $_GET['idS'] ) ; ?>
                    <div class="container"> 
                        <h3 style="color : #0066ff ;"> 
                            MODIFICATION DU COUREUR : <?= $sprinter['nom_coureur'] .' ' . $sprinter['prenom_coureur'] ;?>
                        </h3>
                        <hr> 

                            <div class='row'>
                                <div class='col col-lg-6'>
                                <form class='form' method="post" action='../controleurs/setSprinter.php'>
                                    <div class="form-group">
                                        <h3>Nom du coureur </h3>
                                        <input type='text' name='sprinterName' 
                                               class="form-control"
                                               value="<?= $sprinter['nom_coureur']?>" > 
                                    </div>
                                    <div class="form-group">
                                        <h3>Prémom du coureur </h3>
                                        <input type='text' name='sprinterFirstName' 
                                               class="form-control"
                                               value="<?= $sprinter['prenom_coureur']?>" > 
                                    </div>
                                    <div class="form-group">

                                        Equipe : 
                                        <?php 
                                            $sprinterTeam = getSprinterTeam( $_GET['idS'] ) ;
                                            if ( count ( $sprinterTeam ) == 0 )  
                                                echo "Pas d'équipe" ; 
                                            else {
                                                $team = getTeamById( $sprinterTeam['id_equipe'] ) ;
                                                echo $team[0]['nom_equipe'] ;
                                            }
                                        ?>
                                        <br><hr>
                                        <h3>Changer l'equipe : </h3>
                                        <?php $Team = getAllTeam() ;?>
                                        <select class="form-control" name="idTeam">
                                            <option value="0">...</option>
                                            <?php foreach($Team as $team ){ 
                                                $checked = $team[0]['id_equipe'] == $sprinterTeam['id_equipe'] ? 
                                                        " selected " : " " ;
                                                ?>
                                                <option value="<?= $team['id_equipe']?>" <?= $checked  ?> >
                                                    <?= $team['nom_equipe'] ?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <input type='hidden' value="<?=$_GET['idS']?>" name="idS"> 
                                    <button type='submit' class="btn btn-info">VALIDER</button>

                                </form>
                                </div>
                                <div class="col col-lg-6">
                                </div>
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
                
            <?php
            
        }
    }

