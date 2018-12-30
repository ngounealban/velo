<?php
    include_once '../models/connexion.php';
    include_once '../models/equipe.php' ;
    
if( isset( $_POST['teamName'] ) ) {
    $r = addTeam( $_POST['teamName'] )  ;
}

header("Location:../views/listTeam.php") ;



