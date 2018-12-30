<?php
include_once "../models/equipe.php" ;
include_once "../models/equipe_coureur.php" ;

if( isset( $_POST['idt'] , $_POST['teamName'] , $_POST['idChef'] ) ){
    setTeam($_POST['idt'], $_POST['teamName'] );
    addTeamChef( $_POST['idt'] , $_POST['idChef'] ) ;
}

header('Location:'.$_SERVER['HTTP_REFERER'] ) ;
