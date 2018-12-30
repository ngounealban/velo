<?php
if(session_id() == "")
    session_start() ;
include_once '../models/gestion_championat.php';
include_once "../models/gestion_course.php";
include_once "../models/gestion_coureur.php";

$championat = $_GET["id"];  

    ob_start();

    //classement generale
?>
    <page backtop="1%" backleft="1%" backright="1%" backbottom="1%">
    <p style="font-weight: bold;font-size: 26px;text-align: center;text-decoration:underline"> Resultat Championnat : <?=championat($championat)['nom_championat']?> </p>
    <p style="font-weight: bold;font-size: 20px;text-align: center;">Resultat generale </p>
    <p style="font-weight: bold;font-size: 20px;">Par equipe</p>
       
        <!--code  du classement par equipe-->

        <table border="1px" style="width: 100%;">
        <thead>
            
            <tr style="background-color:  #0066ff;text-align:center; color: white;">
                
                <th style="width: 10%;">RANG</th>
                <th style="width: 15%;">EQUIPE</th>
                <th style="width: 20%;">TEMPS</th>
                <th style="width: 15%;">POINT</th>
                <th style="width: 40%;">TOP 3</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $k = 0;
                     $Liste = get_classement_equipe($championat,0,0);
                     $ordre = get_classement_unique($championat,0,0);
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

    <p style="font-weight: bold;font-size: 20px;">Individuel</p>
    <span style="font-weight: bold;font-size: 16px;margin-left:10px">Selon les points</span>

        <!--code du classement indi -->
        
        <table border="1px" style="width: 100%;">
        <thead>
            <tr style="background-color:  #0066ff;text-align:center; color: white;">       
                <th style="width: 10%;" >RANG</th>
                <th style="width: 20%;" >NOM</th>
                <th style="width: 15%;">PRENOM</th>
                <th style="width: 15%;">EQUIPE</th>
                <th style="width: 20%;">POINT</th>
                <th style="width: 20%;">TEMPS</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                    $k = 0;
                     $Liste = get_classement_unique($championat,0,0);
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
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <br>
    <span style="font-weight: bold;font-size: 16px;margin-left:10px">Selon le temps</span>

        <!--code -->

        <table border="1px" style="width: 100%;">
        <thead>
            <tr style="background-color:  #0066ff;text-align:center; color: white;">       
                <th style="width: 10%;" >RANG</th>
                <th style="width: 15%;" >NOM</th>
                <th style="width: 15%;">PRENOM</th>
                <th style="width: 15%;">EQUIPE</th>
                <th style="width: 15%;">POINT</th>
                <th style="width: 15%;">TEMPS</th>
                <th style="width: 15%;">ECART</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                    $k = 0;
                     $Liste = get_classement_unique($championat,1,0);
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
    </page> 
<?php
    $Liste = get_all_course1($championat);
    foreach ($Liste as $course)
    {
        $id_course = $course['id_course'];
    ?>
        <page backtop="1%" backleft="1%" backright="1%" backbottom="1%">
        <p style="font-weight: bold;font-size: 26px;text-align: center;text-decoration:underline"> COURSE : <?=$course['nom_course']?> </p>
        <p style="font-weight: bold;font-size: 20px;">Par equipe</p>
           
            <!--code  du classement par equipe-->
            
            <table border="1px" style="width: 100%;">
            <thead>
                
                <tr style="background-color:  #0066ff;text-align:center; color: white;">
                    
                    <th style="width: 10%;">RANG</th>
                    <th style="width: 15%;">EQUIPE</th>
                    <th style="width: 20%;">TEMPS</th>
                    <th style="width: 15%;">POINT</th>
                    <th style="width: 40%;">TOP 3</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $k = 0;
                         $Liste = get_classement_equipe($championat,0,$id_course);
                         $ordre = get_classement_unique($championat,0,$id_course);
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
    
        <p style="font-weight: bold;font-size: 20px;">Individuel</p>
        
    
        <table border="1px" style="width: 100%;">
        <thead>
            <tr style="background-color:  #0066ff;text-align:center; color: white;">       
                <th style="width: 10%;" >RANG</th>
                <th style="width: 15%;" >NOM</th>
                <th style="width: 15%;">PRENOM</th>
                <th style="width: 15%;">EQUIPE</th>
                <th style="width: 15%;">POINT</th>
                <th style="width: 15%;">TEMPS</th>
                <th style="width: 15%;">ECART</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                    $k = 0;
                     $Liste = get_classement_unique($championat,1,$id_course);
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
        </page> 
        
      <?php  
    }
    $content = ob_get_clean();
    require("html2pdf/html2pdf.class.php");
    $pdf = new HTML2PDF('P','A4','fr','true','UTF-8');
    $pdf->writeHTML($content);
    ob_end_clean();
    $pdf->Output('liste.pdf'); 
?>