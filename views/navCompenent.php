<?php
    include_once "../models/connexion.php" ;
    if( !is_logged() ) {
        header("Location:../") ;
    }
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../index.php" class="navbar-brand">FenapVélo</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="championshipPage.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GESTION DES CHAMPIONATS&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color : #0066ff; ">
                        <li>
                            <button type="button" class="white bg-marina-hover" style="background: none ; border: none ;" data-toggle="modal" data-target="#addChampModal"> &nbsp;&nbsp;
                                Ajouter championnat
                            </button>
                        </li>
                        <li>
                            <a href="championshipPage.php" class="white bg-marina-hover">Liste des championnats</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GESTION DES EQUIPES&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color : #0066ff ;">
                        <li>
                            <a href="addTeam.php" class="white bg-marina-hover">Ajouter une équipe</a>
                        </li>
                        <li>
                            <a href="listTeam.php" class="white bg-marina-hover">Liste des équipes</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GESTION DES COUREURS&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color : #0066ff ;">
                        <li>
                            <a href="addSprinter.php" class="white bg-marina-hover">Ajouter coureur</a>
                        </li>
                        <li>
                            <a href="sprinterList.php" class="white bg-marina-hover">Liste des coureur</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="profil.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GESTION DES COMPTES&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color : #0066ff ;">
                        
                        <li>
                            <a href="setProfil.php" class="white bg-marina-hover">Modifier compte</a>
                        </li>
                        <li>
                            <a href="../controleurs/logout.php" class="white bg-marina-hover">Se déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>