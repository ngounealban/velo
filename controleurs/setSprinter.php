<?php
    include_once '../models/gestion_coureur.php';
        if( isset ( $_POST['sprinterName'] , $_POST['sprinterFirstName'] , $_POST['idS'] , $_POST['idTeam'] ) ){
            setSprinter($_POST['idS'], $_POST['sprinterName'], $_POST['sprinterFirstName'], $_POST['idTeam'] ) ;
        }
    header('Location:' . $_SERVER['HTTP_REFERER'] ) ;

