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
include_once("../models/gestion_coureur.php");
include_once("../models/gestion_course.php");
include_once("../models/gestion_championat.php");
include_once "navCompenent.php";
include_once "set_gpm.php";
include_once "set_sp.php";
$id_championat = course($_GET['id'])['id_championat'];
?>
<div class="row">
    <div class="col-lg-4">
        
    </div>
    <div class="col-lg-3">
        <button type="button" 
                         
            class="bg-white-hover" data-toggle="modal" data-target="#set_gpm">
                AJOUTER UN GPM
        </button>
    </div>
    <div class="col-lg-3">
        <button type="button" 
                         
            class="bg-white-hover" data-toggle="modal" data-target="#set_sp">
                AJOUTER UN SP
        </button>
    </div>
</div>
<hr>
<div class="container" style="background-color: #0066ff ;">
    <h3>
        CHAMPIONNAT : <?=championat($id_championat)['nom_championat']?> <span><i class="fa  fa-caret-right"></i></span> COURSE : <?=course($_GET['id'])['nom_course']?>
    </h3>
    <hr>
    
    <h4>
       LISTE DES PARTICIPANTS
    </h4>
    <hr>
    
    <table class="table table-responsive table-striped table-hover">
        <thead>
            <tr class="white" style="background-color: #0066ff ;">
                <th>#</th>
                <th>NOM </th>
                <th>PRENOM</th>
                <th>DEPART </th>
                <th>ARRIVEE</th>
                <th>TEMPS</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $coureur_championats = get_all_coureur_championat(course($_GET['id'])['id_championat']);
        $coureurs = get_all_coureur();
        $k = 0;
        $depart = course($_GET['id'])['depart'];
        //var_dump($coureur_championats);
        foreach ($coureurs as $coureur) {
        ?>
            <?php
            if (in_array($coureur['id_coureur'],$coureur_championats)) {
                        $k++;
                        $titre = 'Entrez le temps';
                        $couleur = 'green';
                        $result_time = get_time($_GET['id'],$coureur['id_coureur'])['temps'];
                        $gl = ($result_time)? $result_time:'<i class="fa  icoBt fa-ellipsis-h"></i>';
                        $arrive1 = get_time($_GET['id'],$coureur['id_coureur'])['arrive'];
                        $arrive = ($arrive1)? $arrive1:'<i class="fa  icoBt fa-ellipsis-h"></i>';
                        $status = 1;
                        include "set_sprint_time.php";
                
                ?>
                <tr>
                    <td>
                        <?=$k?>
                    </td>
                    <td>
                        <?= $coureur['nom_coureur']?>
                    </td>
                    <td>
                        <?= $coureur['prenom_coureur']?>
                    </td>
                    <td>
                        <?= $depart?>
                    </td>
                    <td >
                        <button type="button" 
                         
                        class="bg-marina-hover" data-toggle="modal" data-target="#set_sprint_time<?= $coureur['id_coureur']?>">
                                 <?=$arrive?>
                            </button>
                    </td>
                    <td>
                        <?= $gl?>
                    </td>


                </tr>

                <?php
              }
                ?> 
        <?php
        }
        ?>
        </tbody>
    </table>

    
    <!-- Modal -->
    <?php
    include_once "addChampcompenent.php" ;
    ?>
</div>

<div class="container">
    <br><hr>

    <?php
        $all_gmp = get_gmp_course($_GET['id']);
    if(count($all_gmp)>0){

    ?>

    <table class="table table-responsive table-striped table-hover">
        <thead>
            <caption>Liste des GPM</caption>
            <tr class="white" style="background-color: #0066ff ;">
                <th>#</th>
                <th>PREMIER </th>
                <th>DEUXIEME</th>
                <th>TROISIEME</th>
                <th>MODIFIER</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $k = 0;
        foreach ($all_gmp as $gmp) {
        $k++;
        $top3 = explode(":", $gmp["top_3"]);
        include "modifier_gpm.php";
        ?>
                <tr>
                    <td>
                        <?=$k?>
                    </td>
                    <td>
                        <?= nom_prenom($top3[0])?>
                    </td>
                    <td>
                        <?= nom_prenom($top3[1])?>
                    </td>
                    <td>
                        <?= nom_prenom($top3[2])?>
                    </td>
                    <td >
                        <button type="button" 

                        class="bg-marina-hover" data-toggle="modal" data-target="#update_gpm<?=$gmp['id']?>">
                                Modifier
                            </button>
                    </td>


                </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php }?>
</div>

<div class="container">
    <br><hr>

    <?php
        $all_sp = get_sp_course($_GET['id']);
        //var_dump($all_sp);
    if(count($all_sp)>0){
    ?>

    <table class="table table-responsive table-striped table-hover">
        <thead>
            <caption>Liste des SP</caption>
            <tr class="white" style="background-color: #0066ff ;">
                <th>#</th>
                <th>PREMIER </th>
                <th>DEUXIEME</th>
                <th>TROISIEME</th>
                <th>MODIFIER</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $k = 0;
        foreach ($all_sp as $sp) {
        $k++;
        //echo $sp["top_3"];
        $top33 = explode(":", $sp["top_3"]);
        include "modifier_sp.php";
        ?>
                <tr>
                    <td>
                        <?=$k?>
                    </td>
                    <td>
                        <?= nom_prenom($top33[0]) ?>
                    </td>
                    <td>
                        <?= nom_prenom($top33[1])?>
                    </td>
                    <td>
                        <?= nom_prenom($top33[2])?>
                    </td>
                    <td >
                        <button type="button" 
                         
                        class="bg-marina-hover" data-toggle="modal" data-target="#update_sp<?=$sp['id']?>">
                                 Modifier 
                            </button>
                    </td>


                </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php }?>
</div>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/bskit-scripts.js"></script>
</body>
</html>