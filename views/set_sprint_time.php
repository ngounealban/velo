<div id="set_sprint_time<?=$coureur['id_coureur']?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <?php
                $time = get_time_course1($coureur['id_coureur'],$_GET['id']);
                $heures = $time[0];
                $minutes = $time[1];
                $secondes = $time[2];
                $tierces = $time[3];
            ?>
            <form class="form-inline" action="../controleurs/set_time.php?id=<?=$coureur['id_coureur']."/".$_GET['id']?>" method="post">
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="champName">
                                Heures
                            </label>
                            <input type="number" class="form-control" id="heures" name="heures" placeholder="<?=$heures?>">
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Minutes
                            </label>
                            <input type="number" class="form-control" id="minutes" name="minutes" placeholder="<?=$minutes?>">
                        </div>
                        <div class="col-lg-3">
                            <label for="champName">
                                Secondes
                            </label>
                            <input type="number" class="form-control" id="secondes" name="secondes" placeholder="<?=$secondes?>">
                        </div>
                        <div class="col-lg-3">
                            <label for="champName">
                                Tierces
                            </label>
                            <input type="number" class="form-control" id="tierces" name="tierces" placeholder="<?=$tierces?>">
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