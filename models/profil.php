<?php
include_once "connexion.php" ;

function getFisrtEntry() {
    global $bdd ;
    $req = $bdd -> query(" select min(id_championat) as mini from championat ") ;
    return $req->fetch() ;
}

function getPassword() {
    global $bdd ;
    $req = $bdd->query("select * from championat where id_championat = ( select min(id_championat) from championat )  ") ;
    return $req->fetch() ;
}

function setPassword( $newPassword ){
    global $bdd ;
    $idP = getFisrtEntry()['mini'] ;
    $req = $bdd->prepare("update championat set nom_championat = ?  where id_championat = ? ") ;
     $req->execute( [ $newPassword , $idP ] ) or die( print_r( $bdd->errorInfo() ) ) ;
}
