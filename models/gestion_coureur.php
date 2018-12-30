<?php
include_once("connexion.php");

function get_all_coureur()
{
    global $bdd;
        $req = $bdd -> query("
            SELECT  *
            from coureur 
            order by id_coureur desc 
            ");
        $result = $req -> fetchAll();
        return $result;
}


function insert_coureur($nom_coureur,$prenom_coureur)
{
    $nom_coureur = strtoupper($nom_coureur);
    $prenom_coureur = strtoupper($prenom_coureur);
    $date_inscription = date('d:m:y H-i-s');
    global $bdd;
        $req = $bdd -> prepare("
            insert into coureur (nom_coureur,prenom_coureur,date_inscription) 
            values (?,?,?);
            ") ;
        $req -> execute( array($nom_coureur,$prenom_coureur,$date_inscription) )
        or die(print_r($bdd->errorInfo()));
        return 1;
}

function delete_coureur($id)
{

    global $bdd;
        $req = $bdd -> prepare("
            delete from coureur 
            where id_coureur = ?;
            ") ;
        $req -> execute( array($id) )
        or die(print_r($bdd->errorInfo()));
        return 1;

}

function delete_coureur1($id)
{

    global $bdd;
        $req = $bdd -> prepare("
            delete from info_course 
            where id_coureur = ?;
            ") ;
        $req -> execute( array($id) )
        or die(print_r($bdd->errorInfo()));
        return 1;

}
function delete_coureur2($id)
{

    global $bdd;
        $req = $bdd -> prepare("
            delete from coureur_championat 
            where id_coureur = ?;
            ") ;
        $req -> execute( array($id) )
        or die(print_r($bdd->errorInfo()));
        return 1;

}

function delete_coureur3($id)
{

    global $bdd;
        $req = $bdd -> prepare("
            delete from equipe_coureur 
            where id_coureur = ?;
            ") ;
        $req -> execute( array($id) )
        or die(print_r($bdd->errorInfo()));
        return 1;

}
function get_all_coureur_championat($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from coureur_championat 
            where id_championat = ?
            ");
        $req -> execute(array($id) );
        $result = $req -> fetchAll();
        $result1 = [];
        foreach ($result as $value) {
            array_push($result1, $value['id_coureur']);
        }
        return $result1;

}

function get_coureur($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from coureur 
            where id_coureur = ?
            ");
        $req -> execute(array($id) );
        $result = $req -> fetch();
        return $result;
}

function insert_coureur_championat($idco,$idch)
{
     global $bdd;
     $id_coureur = $idco;
     $id_championat = $idch;
     $id_equipe = get_player_team($id_coureur);
        $req = $bdd -> prepare("
            insert into coureur_championat (id_coureur,id_championat,id_equipe) 
            values (?,?,?);
            ") ;
        $req -> execute( array($id_coureur,$id_championat,$id_equipe) )
        or die(print_r($bdd->errorInfo()));
        
    $courses = get_all_courses($idch);  

    foreach ($courses as $value) {
                 if (!exist_info_course($id_coureur,$value["id_course"])) {
                     
                     insert_info_course($id_coureur,$value["id_course"]);
                 }
             }         

        return 1;
}

function  get_all_courses($idch)
{
    global $bdd;
    $req = $bdd -> prepare("
            SELECT  *
            from course
            where id_championat = ?
            ");
        $req -> execute(array($idch) );
        $result = $req -> fetchAll();
        return $result;
}

function insert_info_course($id_coureur,$id_course)
{
    global $bdd;
                $req = $bdd -> prepare("
                insert into info_course (id_coureur,id_course,points,temps) 
                values (?,?,?,?);
                ") ;
            $req -> execute( array($id_coureur,$id_course,0,"00:00:00:000") );
}

function exist_info_course($id_coureur,$id_course)
{
     global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from info_course
            where id_coureur = ? and id_course = ?
            ");
        $req -> execute(array($id_coureur,$id_course) );
        $result = $req -> fetch();
        return $result;
}

function remove_coureur_championat($idco,$idch)
{
    global $bdd;
     $id_coureur = $idco;
     $id_championat = $idch;
        $req = $bdd -> prepare("
            delete from coureur_championat
            where id_coureur = ? and id_championat = ?;
            ") ;
        $req -> execute( array($id_coureur,$id_championat) )
        or die(print_r($bdd->errorInfo()));
        return 1;

}

function  get_classement_unique($where,$resulttype,$resultoption)
{
    global $bdd;
    if ($resultoption==0) {

        if ($resulttype==0) {
                global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from coureur_championat 
                where id_championat = ?
                order by points desc 
                ");
            $req -> execute(array($where) );
            $result = $req -> fetchAll();
            return $result;
        }
        else
        {
               global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from coureur_championat 
                where id_championat = ?
                order by temps asc 
                ");
            $req -> execute(array($where) );
            $result = $req -> fetchAll();
            return $result;
        }
        
    }
    else
    {
        if ($resulttype==0) {
                global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from info_course 
                where id_course = ?
                order by points desc 
                ");
            $req -> execute(array($resultoption));
            $result = $req -> fetchAll();
            return $result;
        }
        else
        {
               global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from info_course 
                where id_course = ?
                order by temps asc 
                ");
            $req -> execute(array($resultoption) );
            $result = $req -> fetchAll();
            return $result;
        }

    }

}
function all_id_equipe($liste)
{ 
    $result = [];
    foreach($liste as $player)
    {
        array_push($result,$player['id_equipe']);
    }
    return $result;
}
 
function ordre_equipe($ordre)
{
    $result1 = [];
    $result2 = [];
    $equipe = all_id_equipe(get_all_equipe());

    foreach($equipe as $player)
    {
        array_push($result1,[$player]);
    }

    foreach($ordre as $player)
    {
        $team = get_player_team($player['id_coureur']);
        if(in_array($team,$equipe) )
        {
            $result1 = update_order($result1,$team,$player['id_coureur'])[0];
            $test = update_order($result1,$team,$player['id_coureur'])[1];
            if($test==5)
            {
                unset($equipe[array_search($team,$equipe)]);
                array_push($result2,Tf($team,$result1));
            }
        }
    }
    return $result2;
}

function Tf($team,$r)
{
    for($i=0;$i<count($r);$i++)
    {
        if($r[$i][0]==$team)
        {
            return $r[$i];
        }
    }

}
function update_order($result1,$team,$id_coureur)
{
    for($i=0;$i<count($result1);$i++)
    {
        if($result1[$i][0]==$team)
        {
            array_push($result1[$i],$id_coureur);
            return [$result1,count($result1[$i])];
        }
    }
}

function points_equipe($id_equipe,$result)
{
    $somme = 0; 
 foreach ($result as $value) {
     if (get_player_team($value["id_coureur"]) == $id_equipe) {
         
         $somme += $value["points"];
     }
 }
 return $somme;
}

function temps_equipe($id_equipe,$result)
{
    $somme = "00:00:00:000"; 
 foreach ($result as $value) {
     if (get_player_team($value["id_coureur"]) == $id_equipe) {
         
         $somme = somme_temps($somme,$value["temps"]);
     }
 }
  return $somme;
}

function soustraction($best,$temps)
{
    if($best == $temps)
    {
        return " / ";
    }
    else
    {
        return diff_temps($best,$temps);
    }
    
}

function diff_temps($t1,$t2)
{
    $tab1 = explode(":", $t1);
    $tab2 = explode(":", $t2);
   // var_dump($tab2);
   // var_dump($tab2);
    $retenu = 0;
    $tab = [00,00,00,000];
    $tab[3] = diff($tab1[3],$tab2[3],$retenu,100)[0];
    $retenu = diff($tab1[3],$tab2[3],$retenu,100)[1]; 
    $tab[2] = diff($tab1[2],$tab2[2],$retenu,60)[0];
    $retenu = diff($tab1[2],$tab2[2],$retenu,60)[1];
    $tab[1] = diff($tab1[1],$tab2[1],$retenu,60)[0];
    $retenu = diff($tab1[1],$tab2[1],$retenu,60)[1];
    $tab[0] = diff($tab1[0],$tab2[0],$retenu,60)[0];
    $retenu = diff($tab1[0],$tab2[0],$retenu,60)[1];
    $tab[3] = format_tierces($tab[3]);
    $tab[2] = format_minutes($tab[2]);
    $tab[1] = format_minutes($tab[1]);
    $tab[0] = format_minutes($tab[0]);
   // var_dump($tab);
    return implode(":", $tab);
}

function diff($tab1,$tab2,$retenu,$max)
{
    if($max==100)
    {
        $somme = intval($tab1)-intval($tab2);
        if($tab1>=$tab2){

            return [$somme,0];
        }
        else
        {
            return [$somme+$max,1];
        } 

    }
    else
    {
        $tab1 = format_tierces(intval($tab1)-$retenu);
        $somme = intval($tab1)-intval($tab2);
        if($tab1>=$tab2){

            return [$somme,0];
        }
        else
        {
            return [$somme+$max,1];
        } 
    }
    
}

function  get_classement_equipe($where,$resulttype,$resultoption)
{
    $resultat = array();
    $equipe = get_all_equipe();
   // var_dump($equipe);
    global $bdd;
    if ($resultoption==0) {

        if ($resulttype==0) {
                global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from coureur_championat 
                where id_championat = ?
                order by points desc 
                ");
            $req -> execute(array($where) );
            $result = $req -> fetchAll();

            foreach ($equipe as $value) {
                $points_equipe = points_equipe($value['id_equipe'],$result);
                $temps_equipe = temps_equipe($value['id_equipe'],$result);
                $actu_result = [nom_equipe($value['id_equipe']),$points_equipe,$temps_equipe];
               // var_dump($points_equipe);
                array_push($resultat, $actu_result);
            }
            return $resultat;
        }
        else
        {
               global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from coureur_championat 
                where id_championat = ?
                order by temps asc 
                ");
            $req -> execute(array($where) );
            $result = $req -> fetchAll();

           foreach ($equipe as $value) {
                $points_equipe = points_equipe($value['id_equipe'],$result);
                $temps_equipe = temps_equipe($value['id_equipe'],$result);
                $actu_result = [nom_equipe($value['id_equipe']),$points_equipe,$temps_equipe];
               // var_dump($points_equipe);
                array_push($resultat, $actu_result);
            }
            return $resultat;
        }
        
    }
    else
    {
        if ($resulttype==0) {
                global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from info_course 
                where id_course = ?
                order by points desc 
                ");
            $req -> execute(array($resultoption));
            $result = $req -> fetchAll();
            foreach ($equipe as $value) {
                $points_equipe = points_equipe($value['id_equipe'],$result);
                $temps_equipe = temps_equipe($value['id_equipe'],$result);
                $actu_result = [nom_equipe($value['id_equipe']),$points_equipe,$temps_equipe];
                array_push($resultat, $actu_result);
            }
            return $resultat;
        }
        else
        {
               global $bdd;
            $req = $bdd -> prepare("
                SELECT  *
                from info_course 
                where id_course = ?
                order by temps asc 
                ");
            $req -> execute(array($resultoption) );
            $result = $req -> fetchAll();
            foreach ($equipe as $value) {
                $points_equipe = points_equipe($value['id_equipe'],$result);
                $temps_equipe = temps_equipe($value['id_equipe'],$result);
                $actu_result = [nom_equipe($value['id_equipe']),$points_equipe,$temps_equipe];
                array_push($resultat, $actu_result);
            }
            return $resultat;
        }

    }

}
function indice_team($Liste,$element)
{
    foreach ($Liste as $value) {
        if($value[0]==nom_equipe($element))
        {
            return $value;
        }
    }  
}
function setSprinterTeam( $idSprinter , $idTeam ){
    global $bdd ;
    $req = $bdd -> prepare( "update equipe_coureur set id_equipe = ?, status_chef = 0 where id_coureur = ? ") ;
    $req->execute( [ $idTeam , $idSprinter ] ) or die( print_r( $bdd->errorInfo() ) ) ;
}
function setSprinter( $idSprinter , $name , $firstName , $idTeam ){
    global $bdd ;
    $req2 = $bdd -> prepare ("update coureur set nom_coureur = ? , prenom_coureur = ? where id_coureur = ? ");
    $req2 -> execute( [ $name , $firstName , $idSprinter ] ) or die( print_r( $bdd->errorInfo() ) ) ;
    setSprinterTeam($idSprinter, $idTeam ) ;
    
}
function get_all_equipe()
{
    global $bdd;
        $req = $bdd -> query("
            SELECT  *
            from equipe 
            order by id_equipe desc 
            ");
        $result = $req -> fetchAll();
        return $result;
}

function get_all_equipe_championat($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from coureur_championat 
            where id_championat = ?
            ");
        $req -> execute(array($id) );
        $result = $req -> fetchAll();
        $result1 = [];
        foreach ($result as $value) {
            array_push($result1, $value['id_equipe']);
        }
        return $result1;

}

function number_of_players($id_equipe)
{
   global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from equipe_coureur
            where id_equipe = ?
            ");
        $req -> execute(array($id_equipe) );
        $result = $req -> fetchAll();
        return count($result);

}

function players($id_equipe)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from equipe_coureur
            where id_equipe = ?
            ");
        $req -> execute(array($id_equipe) );
        $result = $req -> fetchAll();
        return $result;

}

function get_player_team($id_coureur)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from equipe_coureur
            where id_coureur = ?
            ");
        $req -> execute(array($id_coureur) );
        $result = $req -> fetch();
        return $result['id_equipe'];
}

function nom_equipe($id_equipe)
{
     global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from equipe
            where id_equipe = ?
            ");
        $req -> execute(array($id_equipe) );
        $result = $req -> fetch();
        return $result['nom_equipe'];

}



function insert_equipe_championat($idco,$idch)
{
    $players = players($idco);

    foreach ($players as $value) {

        insert_coureur_championat($value['id_coureur'],$idch);
    }
}

function remove_equipe_championat($idco,$idch)
{
   $players = players($idco);

    foreach ($players as $value) {

        if (exist_player_championnat($value['id_coureur'],$idch)) {

            remove_coureur_championat($value['id_coureur'],$idch);
        }
    }

}

function exist_player_championnat($id_coureur,$idch)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from coureur_championat
            where id_coureur = ? and id_championat = ?
            ");
        $req -> execute(array($id_coureur,$idch) );
        $result = $req -> fetch();
        return $result;
}

/*function get_course_championat($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  id_course
            from course 
            where id_championat = ?
            ");
        $req -> execute(array($id) );
        $result = $req -> fetchAll();
        return $result;
}*/
