<?php
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
include_once("../models/gestion_course.php");
include_once("../models/gestion_championat.php");

?>
    <div class="container" style="color: #0066ff ;" >
    <h3>
        LISTES DES COURSES DU CHAMPIONNAT : <?=championat($_GET['id'])['nom_championat']?>
        <span class="text-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#addSprintModal" >
                AJOUTER UNE COURSE
            </button>
        </span>
    </h3>
    <hr>
    <section class="">
        

        <?php
    
            $courses = get_all_course($_GET['id']);
                foreach ($courses as $course) {
                    ?>
                     <div class="white well row" style="background-color: #0066ff ;">
                        <div class="col col-md-9">
                            <?=$course['nom_course']?> <br>
                           TRAJET : <?=$course['trajet_course']?>
                        </div>
                        <div class="col col-md-1">
                            <button class="linkBtn"
                                    onclick="window.location = '../controleurs/delete_race.php?id=<?=$course['id_course']."/".$_GET['id']?>';"
                                    data-toggle="tooltip" data-placement="bottom" title="Supprimer la course"
                                    style="background : none ; border : none ;">
                                <i class="fa fa-2x icoBt fa-bitbucket"></i>
                            </button>
                        </div>
                        <div class="col col-md-2">
                            <button class="linkBtn"
                                    onclick="window.location = 'set_time.php?id=<?=$course['id_course']?>';"
                                    data-toggle="tooltip" data-placement="bottom" title="Liste des participants"
                                    style="background : none ; border : none ;">
                                <i class="fa fa-2x icoBt fa-users"></i>
                            </button>
                        </div>
                         <hr>
                    </div>
                                 
            <?php
         }
        ?>
       
    </section>
    <!-- Modal -->
    <?php
    include_once "addChampcompenent.php" ;
    ?>
    <?php
        include_once "addSprintComponent.php" ;
    ?>
</div>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/bskit-scripts.js"></script>
</body>
</html>