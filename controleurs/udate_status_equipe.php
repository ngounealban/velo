<?php

     include_once ("../models/gestion_coureur.php");
$liste = explode("/", $_GET['id']);
if ($liste[2]==0)
 {
 	$r2 = insert_equipe_championat($liste[0],$liste[1]);
 } 

else
{
	$r2 = remove_equipe_championat($liste[0],$liste[1]);
}

header("Refresh: 0;url=../views/championshipTeam.php?id=$liste[1]");