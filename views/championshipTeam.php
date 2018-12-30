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
include_once("../models/gestion_coureur.php");
include_once("../models/gestion_championat.php");
?>


<div class="container" style="color: #0066ff ;">
    <h3>
        LISTE DES EQUIPES DU CHAMPIONAT : <?=championat($_GET['id'])['nom_championat']?>
    </h3><hr>
    <?php
        $compt = 1 ;
    ?>

    <table class="table table-responsive table-striped table-hover">
        <thead>
            <tr class="white" style="background-color: #0066ff ;">
                <th>#</th>
                <th>NOM</th>
                <th>NOMBRE DE PARTICIPANTS</th>
                <th>AJOUT EQUIPE</th>
            </tr>

        </thead>
        <tbody>
           
            <?php
        $coureur_championats = get_all_equipe_championat($_GET['id']);
        $coureurs = get_all_equipe();
        //var_dump($coureur_championats);
        foreach ($coureurs as $coureur) {
        ?>
            <tr>
                <td>
                    <?= $coureur['id_equipe']?>
                </td>
                <td>
                    <?= $coureur['nom_equipe']?>
                </td>
                <td>
                    <?= number_of_players($coureur['id_equipe'])?>
                </td>
                <td>
                    <?php
                    if (in_array($coureur['id_equipe'],$coureur_championats)) {
                        $titre = 'Enlever coureur du championat';
                        $couleur = 'green';
                        $gl = "fa fa-check";
                        $status = 1;
                    }
                    else
                    {
                      $titre = 'Ajouter coureur au championat';
                        $couleur = 'red';
                        $gl = "fa fa-close";
                        $status = 0;  
                    }
                    ?>
                    <button
                        onclick="window.location = '../controleurs/udate_status_equipe.php?id=<?=$coureur['id_equipe']."/".$_GET['id']."/".$status?>';"
                        style="background: white; border:none ; "
                        data-toggle="tooltip" data-placement="bottom" title="<?=$titre?>">
                        <i class="<?=$gl?>" style="color : <?=$couleur?>;"></i></button>
                </td>
            </tr>
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
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/bskit-scripts.js"></script>
</body>
</html>