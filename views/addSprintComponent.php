<div id="addSprintModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-bicycle orange"></i> AJOUT D'UNE COURSE</h4>
            </div>
            <form action="../controleurs/add_race.php?id=<?=$_GET['id']?>" method="post">
                <div class="modal-body">
                    <p> </p>
                    
                    <div class="form-group">
                        <label for="champName"> 
                            Nom de la course
                        </label>
                        <br>
                        <input type="text" id="champName" name="champName" autofocus class="form-control" placeholder="Saisir le nom du championat">
                    </div>
                    <div class="form-group">
                        <label for="champDes">
                            <i class="orange fa fa-road"></i> Trajet
                        </label>
                        <br>
                        <textarea name="champTra" class="form-control" cols="5" rows="2" placeholder="Definir le trajet de la course" id="champDes"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="champDes">
                            <i class="orange fa fa-gears"></i> Description
                        </label>
                        <br>
                        <textarea name="champDes" class="form-control" cols="5" rows="5" placeholder="Une description du championat" id="champDes"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="champDes">
                            <i class="orange fa fa-gears"></i> Type de course
                        </label>
                        <br>
                        <select name="champType" class="form-control" >
                            <option value="0">Tenir compte du temps</option>
                            <option value="1">Ne pas tenir compte du temps</option>
                        </select>
                    </div> 
                    <div>
                        <?php include 'get_race_time.php' ?>
                        <button type="button"  
                         
                        class="bg-white-hover" data-toggle="modal" data-target="#get_race_time">
                                Definir heure de depart ...
                        </button>
                    </div>
                    
                </div>
                <!--<div class="modal-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>-->
            </form>
        </div>
    </div>
</div>