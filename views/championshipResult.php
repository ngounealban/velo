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
include_once "../models/gestion_course.php";
include_once "../models/gestion_coureur.php";
include_once "../models/gestion_championat.php";


?>
<div class="container" style="color: #0066ff ;">

<div class="row">
    <div class="col-lg-5">
            <label for="resultype">
                <h5>Option du résultat :</h5>
            </label>
            <select name="resulttype" id="opt">
                <option value="0">Résultat championnat</option>
                <?php
                     $courses = get_all_course($_GET['id']);
                    foreach ($courses as $course) {
                ?>
                    <option value="<?=$course['id_course']?>"><?=$course['nom_course']?></option>
                <?php
            }
            ?>
            </select>

    </div>
    <div class="col-lg-4" id="opt-champs">

        <label for="resultOption">
            <h5>Classement : </h5>
        </label>
        <select name="resultoption" id="cls">
           <option value="0"  disable>Point</option>
            <option value="1"  selected>Temps &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>
        </select>

    </div>

    <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-4">
                    <label for="resultOption">
                        <h5>Type :</h5>
                    </label>
                </div>
                <div class="col-lg-8">
                    <select name="resultoption" class="form-control" id="type">
                        <option value="1"  >Individuel</option>
                        <option value="0"  >Equipe</option>
                    </select>
                </div>
            </div>

    </div>
    
</div>
 <hr>
    <h3 style="text-align: center;">
        RESULTAT DU CHAMPIONAT : <?=championat($_GET['id'])['nom_championat']?> </h3>
        
    <hr>

<br>
<br>

<div id="resultat">
    
</div>
    <!-- Modal -->
    <?php
    include_once "addChampcompenent.php" ;
    ?>
</div>  
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function(){

    chargerResultat($("#opt").val(),$("#cls").val(),$("#type").val());

});


        $("#opt").change(function()
            {
                chargerResultat($("#opt").val(),$("#cls").val(),$("#type").val());
            });
        $("#cls").change(function()
            {
                chargerResultat($("#opt").val(),$("#cls").val(),$("#type").val());
            });
        $("#type").change(function()
            {
                chargerResultat($("#opt").val(),$("#cls").val(),$("#type").val());
            });

function chargerResultat(opt,cls,type)
{
    param = opt+"/"+cls+"/"+type+"/"+<?=$_GET["id"]?>;

    $.get("resultat.php?id="+param,function(data)
    {
        $("#resultat").html(data);
    });
}
</script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/bskit-scripts.js"></script>
</body>
</html>