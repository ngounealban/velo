<div id="update_gpm<?=$gmp['id']?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modifier GPM</h4>
            </div>
            <form class="form-inline" action="../controleurs/update_gpm.php?id=<?=$_GET['id']?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="champName">
                                PREMIER
                            </label>
                            <select name="first" class="form-control">
                                <option>choisir</option>
                                <?php
                                    $top3 = explode(":", $gmp["top_3"]);
                                    $coureur_championats = get_all_coureur_championat(course($_GET['id'])['id_championat']);
                                    $coureurs = get_all_coureur();
                                    foreach ($coureurs as $coureur) {
                                    $select = ($coureur['id_coureur']==$top3[0])? "selected":"";
                                    if (in_array($coureur['id_coureur'],$coureur_championats)) {
                                    ?>
                                    <option value="<?=$coureur['id_coureur']?>" <?=$select?> ><?=$coureur['nom_coureur']." ".$coureur['prenom_coureur'] ?></option>
                                    <?php 
                                        }
                                     }                  
                                    ?>
                                
                            </select>
                            <input type="hidden" name="top3" value="<?=$gmp['id']?>">
                        </div>
                        <div class="col-lg-1">
                       
                        </div>
                        <div class="col-lg-3">
                            <label>
                                DEUXIEME
                            </label>
                            <select name="second" class="form-control">
                                <option>choisir</option>
                                <?php
                                    $coureur_championats = get_all_coureur_championat(course($_GET['id'])['id_championat']);
                                    $coureurs = get_all_coureur();
                                    foreach ($coureurs as $coureur) {
                                     $select = ($coureur['id_coureur']==$top3[1])? "selected":"";
                                    if (in_array($coureur['id_coureur'],$coureur_championats)) {
                                    ?>
                                    <option value="<?=$coureur['id_coureur']?>" <?=$select?> ><?=$coureur['nom_coureur']." ".$coureur['prenom_coureur'] ?></option>
                                    <?php 
                                        }
                                     }                  
                                    ?>
                                
                            </select>
                        </div>
                        <div class="col-lg-1">
                             
                        </div>
                        <div class="col-lg-3">
                            <label for="champName">
                                TROISIEME
                            </label>
                            <select name="third" class="form-control">
                                <option>choisir</option>
                                <?php
                                    $coureur_championats = get_all_coureur_championat(course($_GET['id'])['id_championat']);
                                    $coureurs = get_all_coureur();
                                    foreach ($coureurs as $coureur) {
                                    $select = ($coureur['id_coureur']==$top3[2])? "selected":"";
                                    if (in_array($coureur['id_coureur'],$coureur_championats)) {
                                    ?>
                                    <option value="<?=$coureur['id_coureur']?>" <?=$select?> ><?=$coureur['nom_coureur']." ".$coureur['prenom_coureur'] ?></option>
                                    <?php 
                                        }
                                     }                  
                                    ?>
                                
                            </select>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>