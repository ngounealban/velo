<?php

     include_once ("../models/gestion_championat.php");
     
    $r2 = archiver_championat($_GET['id']);

    header('Refresh: 0;url=../views/championshipPage.php');