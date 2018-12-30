<?php
    include_once("connexion.php");
    include_once("gestion_coureur.php");

function get_all_course($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from course 
            WHERE (id_championat = ?)
            order by id_course desc 
            ");
        $req -> execute(array($id))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();
        return $result;
}

function get_all_course1($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from course 
            WHERE (id_championat = ?)
            ");
        $req -> execute(array($id))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();
        return $result;
}

function get_all_last_course()
{
    global $bdd;
        $req = $bdd -> query("
            SELECT  *
            from course
            order by id_course desc 
            ");
        $result = $req -> fetch();
        return $result;
}


function insert_course($nom_course,$description,$trajet,$id_championat,$date_creation,$type_course,$time)
{
    global $bdd;
        $req = $bdd -> prepare("
            insert into course (nom_course,description_course,trajet_course,id_championat,date_creation,type_course,depart) 
            values (?,?,?,?,?,?,?);
            ") ;
        $req -> execute( array($nom_course,$description,$trajet,$id_championat,$date_creation,$type_course,$time) )
        or die(print_r($bdd->errorInfo()));

        $nombre_jouer = get_all_coureur_championat($id_championat);

        $id_course =  get_all_last_course()[ 'id_course' ];

        for ($i=0; $i <count($nombre_jouer) ; $i++) { 
                $id_coureur = $nombre_jouer[$i];
                $req = $bdd -> prepare("
                insert into info_course (id_coureur,id_course,points,temps) 
                values (?,?,?,?);
                ") ;
            $req -> execute( array($id_coureur,$id_course,0,"00:00:00:000") )
            or die(print_r($bdd->errorInfo()));
        }
        
        return 1;

}

function delete_course($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            delete from course 
            where id_course = ?;
            ") ;
        $req -> execute( array($id) )
        or die(print_r($bdd->errorInfo()));
        return 1;

}

function course($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from course
            WHERE (id_course = ? )
            ");
        $req -> execute(array($id))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetch();
        return $result;

}

function get_id_championat($id)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from course
            WHERE (id_course = ? )
            ");
        $req -> execute(array($id))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetch();
        return $result['id_championat'];

}



function get_time($id_course,$id_coureur)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from info_course
            WHERE (id_course = ? and id_coureur = ?)
            ");
        $req -> execute(array($id_course,$id_coureur))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetch();
        return $result;

}

function set_time($id_coureur,$id_course,$temps)
{
    global $bdd;
    $req = $bdd -> prepare("
            update info_course 
            set temps = ? 
            where (id_course = ? and id_coureur = ? );
            ") ;
        $req -> execute( array($temps,$id_course,$id_coureur) )
        or die(print_r($bdd->errorInfo()));

    //update point(course)
        return 1;

}

// this fonction help to modified the time of a sprinter
function set_time1($id_coureur,$id_course,$temps,$arrive)
{
    global $bdd;
    $req = $bdd -> prepare("
            update info_course 
            set temps = ?, arrive = ?
            where (id_course = ? and id_coureur = ? );
            ") ;
        $req -> execute( array($temps,$arrive,$id_course,$id_coureur) )
        or die(print_r($bdd->errorInfo()));

    //update point(course)
        return 1;

}

function get_time_course($id_coureur,$_course)
{
    return explode(":",get_time($_course,$id_coureur)['temps']);
}
function get_time_course1($id_coureur,$_course)
{
    return explode(":",get_time($_course,$id_coureur)['arrive']);
}
function update_course_info($id_course)
{
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from info_course 
            WHERE (id_course = ?)
            order by temps asc 
            ");
        $req -> execute(array($id_course))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();

    for ($i=0; $i<count($result) ;$i++) { 
        update_point($id_course,$result[$i]["id_coureur"],point($i));
    }
}

function update_point($id_course,$id_coureur,$point)
{
    global $bdd;
    $req = $bdd -> prepare("
            update info_course 
            set points = ? 
            where (id_course = ? and id_coureur = ? );
            ") ;
        $req -> execute( array($point,$id_course,$id_coureur) )
        or die(print_r($bdd->errorInfo()));
}

function point($i)
{
    $tab = [10,10,8,8,6,6,4,4,2,2];
    if ($i<10) {
        return $tab[$i];
    }
    return 0;
}

function update_championat($id_championat)
{
    
    global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from coureur_championat 
            WHERE (id_championat = ?)
            ");
        $req -> execute(array($id_championat))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();

    for ($i=0; $i<count($result);$i++) { 
        $points = get_all_point_championat($result[$i]["id_coureur"],$id_championat);
        $temps = get_all_time_championat($result[$i]["id_coureur"],$id_championat);
        update_infos_championat($id_championat,$result[$i]["id_coureur"],$points,$temps);
    }


}

function update_infos_championat($id_championat,$id_coureur,$point,$temps)
{
    global $bdd;
    $req = $bdd -> prepare("
            update coureur_championat
            set points = ? , temps = ?
            where (id_championat = ? and id_coureur = ? );
            ") ;
        $req -> execute( array($point,$temps,$id_championat,$id_coureur) )
        or die(print_r($bdd->errorInfo()));
}

function get_all_point_championat($id_coureur,$id_championat)
{
    $points = 0;
   global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from info_course 
            WHERE (id_coureur = ?)
            ");
        $req -> execute(array($id_coureur))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();
    for ($i=0; $i<count($result) ;$i++) {
        if (get_id_championat($result[$i]["id_course"]) == $id_championat) {
            $points += $result[$i]["points"];
        }
    }
    return $points;
}

function get_all_time_championat($id_coureur,$id_championat)
{
    $temps = "00:00:00:000";
   global $bdd;
        $req = $bdd -> prepare("
            SELECT  *
            from info_course 
            WHERE (id_coureur = ?)
            ");
        $req -> execute(array($id_coureur))
        or die(print_r($bdd->errorInfo()));
        $result = $req -> fetchAll();
    for ($i=0; $i<count($result) ;$i++) {
        if (get_id_championat($result[$i]["id_course"]) == $id_championat) {

            $temps = somme_temps($temps,$result[$i]["temps"]);
        }
    }
    return $temps;
}

function somme_temps($t1,$t2)
{
    $tab1 = explode(":", $t1);
    $tab2 = explode(":", $t2);
    
    $retenu = 0;
    $tab = [00,00,00,000];
    //var_dump (somme($tab1[3],$tab2[3],$retenu,100));
    $tab[3] = somme($tab1[3],$tab2[3],$retenu,100)[0];
    $retenu = somme($tab1[3],$tab2[3],$retenu,100)[1];
             
    $tab[2] = somme($tab1[2],$tab2[2],$retenu,60)[0];
    $retenu = somme($tab1[2],$tab2[2],$retenu,60)[1];
 
    $tab[1] = somme($tab1[1],$tab2[1],$retenu,60)[0];
    $retenu = somme($tab1[1],$tab2[1],$retenu,60)[1];


    $tab[0] = somme($tab1[0],$tab2[0],$retenu,24)[0] + somme($tab1[0],$tab2[0],$retenu,24)[1];
  
    $tab[3] = format_tierces($tab[3]);
    $tab[2] = format_minutes($tab[2]);
    $tab[1] = format_minutes($tab[1]);
    $tab[0] = format_minutes($tab[0]);
   // var_dump($tab);
    return implode(":", $tab);
}

function format_minutes($indice)
{
    if(strlen($indice)==0)
    {
        return '00';
    }
    if (strlen($indice)==1 ) {
        $indice = "0".$indice;
    }
    return $indice;
}
function format_tierces($indice)
{
    if(strlen($indice)==0)
    {
        return '000';
    }
    if (strlen($indice)==1) {
        $indice = "00".$indice;
    }
    else
    {
        if (strlen($indice)==2) {
        $indice = "0".$indice;
        }
    }
        

    return $indice;
}

function somme($tab1,$tab2,$retenu,$max)
{
    $somme = intval($tab1)+intval($tab2)+intval($retenu);
    return [$somme%$max,floor($somme/$max)];
}

function inser_gpm($id,$first,$second,$third)
{
    $top = $first.":".$second.":".$third;
    global $bdd;
    $req = $bdd -> prepare("
    insert into gpm_sp (id_course,type,top_3) 
    values (?,?,?);
                ") ;
    $req -> execute( array($id,"gmp",$top) );
}

function inser_sp($id,$first,$second,$third)
{
    $top = $first.":".$second.":".$third;
    global $bdd;
    $req = $bdd -> prepare("
    insert into gpm_sp (id_course,type,top_3) 
    values (?,?,?);
                ") ;
    $req -> execute( array($id,"sp",$top) );
}

function update_point($id)
{
    $top =explode(":",top_extra($id)) ;
    add_point($top[0],$id,15);
    add_point($top[1],$id,10);
    add_point($top[2],$id,5);
}

function top_extra($id)
{
  global $bdd;
        $req = $bdd -> query("
            SELECT  *
            from gmp_sp
            order by id desc 
            ");
        $result = $req -> fetch();
        return $result["top_3"];  
}