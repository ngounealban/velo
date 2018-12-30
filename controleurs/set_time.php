<?php

include_once ("../models/gestion_course.php");
include_once ("../models/gestion_coureur.php");
include_once ("../models/gestion_championat.php");
/*echo explode("/", $_GET['id'])[0];
echo explode("/", $_GET['id'])[1];*/

$heures = format_minutes($_POST['heures']);
$minutes = format_minutes($_POST['minutes']);
$secondes = format_minutes($_POST['secondes']);
$tierces = format_tierces($_POST['tierces']);
$depart = course(explode("/", $_GET['id'])[1])['depart'];

$time = $heures.":".$minutes.":".$secondes.":".$tierces;


if($depart<$time)
{

	$arrive = $time;
	//echo $arrive." and  ".$depart;
	$time = diff_temps($arrive,$depart);
	//set_time(explode("/", $_GET['id'])[0],explode("/", $_GET['id'])[1],$time);
	set_time1(explode("/", $_GET['id'])[0],explode("/", $_GET['id'])[1],$time,$arrive);

	update_course_info(explode("/", $_GET['id'])[1]);
	update_championat(get_id_championat(explode("/", $_GET['id'])[1]));


	$championat =get_id_championat(explode("/", $_GET['id'])[1]);
	//header("Refresh: 6;url=../views/set_time.php?id=$id_championat");
}
header("Refresh: 0;url=".$_SERVER['HTTP_REFERER']);