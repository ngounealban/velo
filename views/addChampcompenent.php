
<div id="addChampModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color : #0066ff ;"><i class="fa fa-bicycle"></i> AJOUT D'UN CHAMPIONNAT</h4>
            </div>
            <form action="../controleurs/add_championat.php" method="post">
                <div class="modal-body">
                    <p> </p>
                    <div class="form-group">
                        <label for="champName" style="color : #000 ;">
                            Nom du championnat
                        </label>
                        <br>
                        <input type="text" id="champName" name="champName" autofocus class="form-control" placeholder="Saisir le nom du championat">
                    </div>
                    <div class="form-group">
                        <label for="champDes" style="color : #000 ;">
                            <i class="blue fa fa-gears"></i> Description
                        </label>
                        <br>
                        <textarea name="champDes" class="form-control" cols="40" rows="10" placeholder="Une description du championat" id="champDes"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>