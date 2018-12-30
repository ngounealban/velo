<?php
include_once "../models/profil.php" ;
if( isset( $_POST['password'] , $_POST['confirmPassword'] ) ){
    if( $_POST['password'] == $_POST['confirmPassword'] ){
        setPassword( $_POST['password'] ) ;
    }    
}

header("Location:" . $_SERVER['HTTP_REFERER'] ) ;