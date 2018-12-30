<?php

if ( session_id() != "" ) {
    session_abort();
    session_destroy() ;
}
    header( "Location:../index.php" ) ;
