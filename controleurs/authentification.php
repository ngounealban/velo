<?php
    include_once ("../models/gestion_championat.php");
    if(session_id() == "")
        session_start() ;

if (isset($_POST['password'])){
    extract($_POST); 
 
    $resultat = is_password($password);

    if($resultat)
    {

            header('Location:../views/championshipPage.php');
            $_SESSION['resulttype'] = 0;
            $_SESSION['resultoption'] = 0;
            $_SESSION['user'] = "connected" ;
    }

    else
    {
        header('Location:../views/home.php');
    }
}