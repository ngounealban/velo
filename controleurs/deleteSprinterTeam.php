<?php

include_once "../models/equipe_coureur.php" ;

if( isset( $_GET['idt'] , $_GET['idS'] ) ){
    //deleteTeamSprinterBySprinter( $_GET['idS'] ) ;
}

header('Location:'.$_SERVER['HTTP_REFERER'] ) ;
