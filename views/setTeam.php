<?php

    include_once '../models/equipe.php' ;
    include_once '../models/equipe_coureur.php' ;
    include_once '../models/gestion_coureur.php' ;
    include_once '../models/connexion.php';
    if( !is_logged() ) {
        header("Location:../") ;
    }

if( isset ($_GET['idt']) ){
    if( count( getTeamById( $_GET['idt'] )) != 0 ) {
        
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
        <?php $team = getTeamById(  $_GET['idt'] ) ; ?>
        <div class="container"> 
            <h3 style="color : #0066ff ;"> 
                MODIFICATION DE L'EQUIPE : <?= $team[0]['nom_equipe'] ;?>
            </h3>
            <hr> 

                <div class='row'>
                    <div class='col col-lg-6'>
                    <form class='form' method="post" action='../controleurs/setTeam.php'>
                        <div class="form-group">
                            <h3>Nom de l'équipe </h3>
                            <input type='text' name='teamName' 
                                   class="form-control"
                                   value="<?= $team[0]['nom_equipe']?>" > 
                        </div>
                        <div class="form-group">
                            
                            Chef de l'équipe : 
                            <?php 
                                $teamChef =  searchTeamChef( $_GET['idt'] ) ;
                                if ( count ( $teamChef ) == 0 )  
                                    echo "Pas de chef" ; 
                                else {
                                    $sprinterMan = get_coureur( $teamChef[0]['id_coureur'] );
                                    echo $sprinterMan['nom_coureur'].' '.$sprinterMan['prenom_coureur'] ;
                                    
                                }
                            ?>
                            <br><hr>
                            <h3>Choisir le chef de l'equipe : </h3>
                            <?php $TeamSprinter = getAllSprinterByTeam( $_GET['idt'] ) ;?>
                            <select class="form-control" name="idChef">
                                <option value="0">...</option>
                                <?php foreach($TeamSprinter as $sprinter ){ 
                                    $checked = $sprinter['status_chef'] == 0 ? 
                                            "" : " selected " ;
                                    ?>
                                    <option value="<?= $sprinter['id_coureur']?>" <?= $checked  ?> >
                                        <?= $sprinter['nom_coureur'] . ' ' . $sprinter['prenom_coureur'] ?>
                                    </option>
                                <?php }?>
                            </select>
                        </div>
                        <input type='hidden' value="<?=$_GET['idt']?>" name="idt"> 
                        <button type='submit' class="btn btn-info">VALIDER</button>
                        
                    </form>
                    </div>
                    <div class="col col-lg-6">
                        <h4>Membres de l'équipe</h4>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr class="white" style="background-color: #0066ff ;">
                                    <th>NOM </th>
                                    <th>PRENOM</th>
                                    <th>STATUT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach( $TeamSprinter as $sprinter ){
                                        echo "<tr>" ;
                                        echo "<td>". $sprinter['nom_coureur']."</td>" ;
                                        echo "<td>". $sprinter['prenom_coureur']."</td>" ;
                                        echo "<td>". ( $sprinter['status_chef'] == 0 ? "membre" : "chef" ) ."</td>" ;
                                        
                                        echo "</tr>" ;
                                    }
                                ?>
                            </tbody>
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
    
    }else {
    header("Location:listTeam.php") ;
}

