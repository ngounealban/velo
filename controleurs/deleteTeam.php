<?php
    include_once "../models/connexion.php" ;
    include_once "../models/equipe.php" ;
    
if( isset( $_GET['idt'] ) ) {
    deleteTeam( $_GET['idt'] ) ;
}

header("Location:" . $_SERVER['HTTP_REFERER'] ) ;
