<?php

     include_once ("../models/gestion_course.php");

if (isset($_POST['champName']) and isset($_POST['champDes']) and isset($_POST['champTra'])){
    $heures = format_minutes($_POST['heures']);
    $minutes = format_minutes($_POST['minutes']);
    $secondes = format_minutes($_POST['secondes']);
    $tierces = format_tierces($_POST['tierces']);


    $time = $heures.":".$minutes.":".$secondes.":".$tierces;

    extract($_POST); 
    $nom_course = strtoupper($champName);
    $description = $champDes;
    $trajet = $champTra;
    $type_course = $champType;
    $date_creation = date("Y-m-d");
    $id_championat = $_GET['id']; 
    $r2 = insert_course($nom_course,$description,$trajet,$id_championat,$date_creation,$type_course,$time);

   header("Refresh: 0;url=../views/championshipSprint.php?id=$id_championat");
}