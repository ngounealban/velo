<?php

     include_once ("../models/gestion_coureur.php");
     
    $r2 = delete_coureur($_GET['id']);
    delete_coureur1($_GET['id']);
    delete_coureur2($_GET['id']);
    delete_coureur3($_GET['id']);
    header('Refresh: 0;url=../views/sprinterList.php');
