<?php

include_once 'connexion.php' ;
include_once 'equipe_coureur.php' ;

function searchTeam( $teamName ){
    global $bdd ;
    $req = $bdd->prepare( "select * from equipe where nom_equipe = ? " ) ;
    $req->execute( [ $teamName ] ) or die( print_r( $dbb->errorInfo() ) );
    return $req -> fetchAll() ;
}

function addTeam( $teamName ) {
    global $bdd ;
    $req = $bdd->prepare( "insert into equipe( nom_equipe ) values( ? )") ;
    if(count( searchTeam($teamName)) == 0 ){
        $req->execute( [ $teamName ] ) or die( print_r( $dbb->errorInfo() ) );
        return true ;
    }else {
        return false ;
    }
} 

function setTeam( $idTeam , $teamName){
    global $bdd ;
    $req = $bdd->prepare( "update equipe set nom_equipe = ? where id_equipe = ? ") ;
    $req->execute([ $teamName , $idTeam]) or die( print_r( $bdd->errorInfo() ) ) ;
}
function getAllTeam(){
    global $bdd ;
    $req = $bdd->query("select * from equipe") ;
    return $req->fetchAll() ;
}


function getTeamById( $idTeam ){
    global $bdd ;
    $req = $bdd->prepare( "select * from equipe where id_equipe = ? " ) ;
    $req->execute( [ $idTeam ] ) or die( print_r( $bdd->errorInfo() ) ) ;
    return $req->fetchAll() ; 
}

function deleteTeam ( $idTeam ){
    global $bdd ;
    $req = $bdd->prepare( "delete from equipe where id_equipe = ? " ) ;
    $req->execute( [ $idTeam ] ) or die ( print_r( $bdd->errorInfo() ) )  ;
    deleteTeamSprinter($idTeam) ;
}




