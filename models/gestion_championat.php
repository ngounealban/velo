<?php
	include_once("connexion.php");

function is_password($password)
{
	 global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from championat 
            WHERE (id_championat = ?); ");
        $req -> execute(array(1))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetch();
        $nb = $result['nom_championat'] == $password;
            return $nb;
}

function get_all_championat()
{
	global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from championat 
            WHERE (id_championat != ? and visibilite = 1)
            order by id_championat desc 
            ");
        $req -> execute(array(1))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();
        return $result;
}


function insert_championat($nom_championat,$description,$visibilite,$date_creation)
{
	global $bdd;
        $req = $bdd -> prepare("
            insert into championat (nom_championat,description,visibilite,date_creation) 
            values (?,?,?,?);
            ") ;
        $req -> execute( array($nom_championat,$description,$visibilite,$date_creation) )
        or die(print_r($bdd->errorInfo()));
        return 1;
}

function archiver_championat($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            update championat 
            set visibilite = 0 
            where id_championat = ?;
            ") ;
        $req -> execute(array($id))
        or die(print_r($bdd->errorInfo()));
        return 1;

}

function championat($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from championat 
            WHERE (id_championat = ? )
            ");
        $req -> execute(array($id))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetch();
        return $result;

}