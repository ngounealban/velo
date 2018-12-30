<?php

     include_once ("../models/gestion_championat.php");

if (isset($_POST['champName']) and isset($_POST['champDes'])){
    extract($_POST); 
    $nom_championat = strtoupper($champName);
    $description = $champDes;
    $visibilite = 1;
    $date_creation = date("Y-m-d h:m:s");
     
    $r2 = insert_championat($nom_championat,$description,$visibilite,$date_creation);

   header('Refresh: 0;url=../views/championshipPage.php');
}