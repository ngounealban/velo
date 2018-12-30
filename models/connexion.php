<?php
/*
 * return @boolean 
 */
if( session_id() == "") {
    session_start() ;
}
function is_logged(){
    return isset( $_SESSION['user'] )  ? true : false ; 
}

try {
    $bdd = new PDO(
        'mysql:host=localhost;dbname=velo',
        'root',
        '');
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect = true ;
} catch (Exception $e){
    die("Implossible de se connecter à la base de données. Erreur : ".$e->getMessage());
}
if( isset($_SESSION['access_granted']) and $_SESSION['access_granted'] == true ){
    $access_granted = true;
}

