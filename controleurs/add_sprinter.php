<?php

     include_once ("../models/gestion_coureur.php");
     include_once ("../models/equipe_coureur.php");
     

if( isset( $_POST['sprinterName'] , $_POST['sprinterFirstName'], $_POST['idTeam'] ) ){
    extract($_POST); 
    $nom_coureur = $sprinterName;
    $prenom_coureur = $sprinterFirstName;
    $team = $idTeam ;
    $r2 = addSprinter( $team, $nom_coureur, $prenom_coureur);
}
    header('Refresh: 0;url=../views/addSprinter.php');