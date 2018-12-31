 <?php
include_once ("../models/gestion_course.php");
include_once ("../models/gestion_coureur.php");
include_once ("../models/gestion_championat.php");
/*echo explode("/", $_GET['id'])[0];
echo explode("/", $_GET['id'])[1];*/
extract($_POST);
if($first!=$second and $first!=$third and $third!=$second and $first!="choisir" and $second!="choisir" and  $third!="choisir")
{
	//echo $top3;
	retirer($_GET['id'],$top3);
	inser_gpm($_GET['id'],$first,$second,$third);
	update_point_extra($_GET['id']);
	update_championat(get_id_championat($_GET['id']));
	echo "operation reussi!!";
}
else
{
	echo "echec de l'operation"; 
}
header("Refresh: 1;url=".$_SERVER['HTTP_REFERER']);
