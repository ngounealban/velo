<?php
include_once "../models/gestion_course.php";
include_once "../models/gestion_coureur.php";
include_once "../models/gestion_championat.php";
$opt = explode("/", $_GET['id'])[0];
$cls = explode("/", $_GET['id'])[1];
$type = explode("/", $_GET['id'])[2];//equipe ou individuel
$where = explode("/", $_GET['id'])[3];//
if (explode("/", $_GET['id'])[2]==1) {
    ?> 
        <table class="table table-responsive table-striped table-hover">
        <thead>
            <tr class="white" style="background-color:  #0066ff ;">
                <th>RANG</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>EQUIPE</th>
                <th>POINT</th>
                <th>TEMPS</th>
                <th>ECART</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                    $k = 0;
                     $Liste = get_classement_unique($where,$cls,$opt);
                     if(count($Liste)>0)
                        $best = $Liste[0]['temps'];
                    
                    foreach ($Liste as $element) {
                        $k++;
                ?>
                    <tr>
                        <td><?=$k?></td>
                        <td><?=get_coureur($element['id_coureur'])['nom_coureur']?></td>
                        <td><?=get_coureur($element['id_coureur'])['prenom_coureur']?></td>
                        <td><?=nom_equipe(get_player_team($element['id_coureur']))?></td>
                        <td><?=$element['points']?></td>
                        <td><?=$element['temps']?></td>
                        <td><?=soustraction($element['temps'],$best)?></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php 
}
else{
    ?>
    
        <table class="table table-responsive table-striped table-hover">
        <thead>
            
            <tr class="white" style="background-color:  #0066ff ;">
                <th>RANG</th>
                <th>EQUIPE</th>
                <th>TEMPS</th>
                <th>POINT</th>
                <th>TOP 3</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $k = 0;
                     $Liste = get_classement_equipe($where,$cls,$opt);
                     $ordre = get_classement_unique($where,$cls,1);
                     $ordre_equipe = ordre_equipe($ordre);
                     //var_dump($ordre_equipe);
                    foreach ($ordre_equipe as $element) {
                        $k++;
                        $indice = indice_team($Liste,$element[0]);
                ?>
                    <tr>
                        <td><?=$k?></td>
                        <td><?=$indice[0]?></td>
                        <td><?=$indice[2]?></td>
                        <td><?=$indice[1]?></td>
                        <td><?=get_coureur($element[1])['nom_coureur'].",".get_coureur($element[2])['nom_coureur'].",".get_coureur($element[3])['nom_coureur']?></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
     