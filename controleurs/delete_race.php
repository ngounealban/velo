<?php

     include_once ("../models/gestion_course.php");
    $liste = explode("/", $_GET['id']);
    $r2 = delete_course($liste[0]);
    $id_championat = $liste[1];

header("Refresh: 0;url=../views/championshipSprint.php?id=$id_championat");