<?php

include_once 'connexion.php' ;
include_once 'gestion_coureur.php' ;



function searchTeamChef( $idTeam ){
    global $bdd ;
    $req = $bdd -> prepare( "select * from equipe_coureur where id_equipe = ? and status_chef = 1 " ) ;
    $req->execute( [ $idTeam ]  )  or die( print_r( $bdd->errorInfo() ) ); 
    return $req->fetchAll() ;
}

function setTeamChef( $idTeam , $idCoureur ){
    global $bdd ;
    $req = $bdd ->prepare( "update equipe_coureur set status_chef = 1 "
            . "where id_equipe = ? and id_coureur = ? ") ;
    //echo "idTeam = " . $idTeam . " id coureur = " . $idCoureur ;
    //die() ;
    $req->execute( [ $idTeam, $idCoureur ] ) or die( print_r( $bdd->errorInfo() ) ); 
    
}

function deleteTeamSprinter( $idTeam ){
    global $bdd ;
    $req = $bdd->prepare( "delete from equipe_coureur where id_equipe = ? ") ;
    $req->execute( [ $idTeam ] ) or die( print_r( $bdd->errorInfo() ) ); 
}

function deleteTeamSprinterBySprinter( $idSprinter ){
    global $bdd ;
    $req = $bdd->prepare( "delete from equipe_coureur where id_coureur = ? ") ;
    $req->execute( [ $idSprinter ] ) or die( print_r( $bdd->errorInfo() ) ); 
}



function addTeamChef( $idTeam , $idSprinter ){
    global $bdd ;
    if( count( searchTeamChef($idTeam) ) == 0 ){
        setTeamChef( $idTeam , $idSprinter ) ;
    }else {
        $stat = $bdd -> prepare ( "update equipe_coureur set status_coureur = 0 where id_equipe = ? " ) ;
        $stat -> execute( [ $idteam ] ) or die( print_r( $bdd->errorInfo() ) ) ;
        setTeamChef($idTeam, $idSprinter) ; 
    }
}



function searchSprinterTeam( $idSprinter ){
    global $bdd ;
    $req = $bdd->prepare("select * from equipe_coureur where id_coureur = ? ") ;
    $req->execute( [ $idSprinter ] ) or die( print_r( $bdd->errorInfo() ) ) ;
    return $req->rowCount() ;
}

function addSprinter( $idTeam , $nom_coureur , $prenom_coureur  ){
    global $bdd ;
    insert_coureur($nom_coureur, $prenom_coureur) ;
    $req2 = $bdd->query("select * from coureur where id_coureur = ( select max( id_coureur) from coureur ) ") ;
    $result2 = $req2->fetch() ;
    $l = searchSprinterTeam( $result2['id_coureur'] )   ;
    if( $l == 0  ){
        $req3 = $bdd->prepare("insert into equipe_coureur( id_coureur , id_equipe ) values ( ? , ? )  ") ;
        $req3->execute( [ $result2['id_coureur'] , $idTeam ] ) or die( print_r( $bdd->errorInfo() ) ) ;
        return true ;
    }else {
        return false ;
    }
}

function getAllSprinter(){
    global $bdd ;
    $req = $bdd->query("select * from equipe_coureur") ;
    return $req->fetchAll() ;
}

function getAllSprinterByTeam( $idTeam ){
    global $bdd ;
    $req = $bdd->prepare("select * from equipe_coureur , coureur "
            . "where equipe_coureur.id_equipe = ? and equipe_coureur.id_coureur = coureur.id_coureur" );
    $req->execute ( [ $idTeam ] ) or die( print_r( $bdd->errorInfo() ) ) ;
    return $req->fetchAll() ;
}

function getSprinterTeam( $idSprinter){
    global $bdd ;
    $req = $bdd -> prepare("select * from equipe_coureur where id_coureur = ? " ) ;
    $req->execute( [ $idSprinter] ) or die( print_r( $bdd->errorInfo() ) ) ;
    return $req->fetch() ;
}